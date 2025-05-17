<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\detailpesanan;
use App\Models\keranjang;
use App\Models\pembayaran;
use App\Models\pesanan;
use App\Models\produk;
use App\Models\ulasan;
use App\Models\wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function produk()
    {
        $produks = produk::latest()->get();
        return view('pembeli.index', compact('produks'));
    }
    public function beranda()
    {
        return view('pembeli.beranda');
    }

    public function index1()
    {
        $items = keranjang::with('produk')->where('user_id', Auth::id())->get();

        return view('pembeli.keranjang', compact('items'));
    }

    // Menambahkan produk ke keranjang
    public function tambah(Request $request, $produk_id)
    {
        // Cek data yang dikirim
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        // Cek apakah produk sudah ada di keranjang
        $keranjang = keranjang::where('user_id', Auth::id())->where('produk_id', $produk_id)->first();

        if ($keranjang) {
            // Jika sudah ada, update jumlah
            $keranjang->jumlah += $request->jumlah;
            $keranjang->save();
        } else {
            // Jika belum ada, buat baru
            keranjang::create([
                'user_id'    => Auth::id(),
                'produk_id'  => $produk_id,
                'jumlah'     => $request->jumlah,
            ]);
        }

        return redirect()->route('pembeli.keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }


    // Menghapus item dari keranjang
    public function hapus($id)
    {
        $item = Keranjang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $item->delete();

        return redirect()->route('pembeli.keranjang')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
    public function checkout()
    {
        // Mengambil data keranjang untuk user yang sedang login
        $keranjang = keranjang::where('user_id', Auth::id())->get();
        return view('pembeli.checkout', compact('keranjang'));
    }
    public function prosesCheckout(Request $request)
    {
        DB::beginTransaction();
        
        try {
            // Hitung total harga seluruh keranjang
            $keranjang = keranjang::where('user_id', Auth::id())->get();

            // dd($keranjang);
            $totalHarga = $keranjang->sum(function($item) {
                return $item->produk->harga * $item->jumlah;
            });
    
            // Simpan pesanan
            $pesanan = pesanan::create([
                'user_id' => Auth::id(),
                'status' => 'diproses',
                'status_pembayaran' => $request->metode_pembayaran,
                'total_harga' => $totalHarga,
            ]);


            // dd($pesanan);

            // Simpan pembayaran
            if ($request->metode_pembayaran === 'transfer') {
                $buktiPath = $request->hasFile('bukti_pembayaran') 
                    ? $request->file('bukti_pembayaran')->store('bukti', 'public') 
                    : null;
    
                pembayaran::create([
                    'pesanan_id' => $pesanan->id,
                    'nama_penerima' => $request->nama_penerima,
                    'alamat_pengiriman' => $request->alamat,
                    'nomor_telepon' => $request->nomor_telepon,
                    'bukti_pembayaran' => $buktiPath,
                    'status' => 'menunggu',
                ]);
            } elseif ($request->metode_pembayaran === 'cod') {
                pembayaran::create([
                    'pesanan_id' => $pesanan->id,
                    'nama_penerima' => $request->nama_penerima, 
                    'nomor_telepon' => $request->nomor_telepon,
                    'alamat_pengiriman' => $request->alamat,
                    'status' => 'menunggu',
                ]);
            }
    
            foreach ($keranjang as $item) {
                detailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $item->produk_id,
                    'jumlah' => $item->jumlah,
                    'sub_total' => $item->produk->harga * $item->jumlah,
                ]);
            }
    
            $keranjang->each->delete();
    
            DB::commit();
    
            return redirect()->route('pesanan.detail', $pesanan->id)->with('success', 'Pesanan berhasil diproses.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
            return redirect()->route('keranjang.checkout')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    
    // Menampilkan detail pesanan untuk pembeli
    public function detailPesanan()
    {
        $pesanan = pesanan::with('detailPesanan.produk')
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('pembeli.detailpesanan', compact('pesanan'));
    }
    public function index()
    {
        // 1. Data utama: paginasi 6 per halaman
        $wisatas = Wisata::latest()->paginate(6);

        // 2. Sidebar: semua lokasi unik beserta jumlahnya
        $lokasiList = Wisata::select('lokasi')
            ->distinct()
            ->pluck('lokasi');

        $lokasiCounts = Wisata::select('lokasi')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('lokasi')
            ->pluck('total', 'lokasi');

        // 3. Wisata terbaru (5 item)
        $recentWisata = Wisata::latest()->take(5)->get();

        return view('pembeli.produk', compact(
            'wisatas',
            'lokasiList',
            'lokasiCounts',
            'recentWisata'
        ));
    }

    /**
     * Tampilkan detail satu wisata.
     */
    public function show($id)
    {
        // Ambil data utama
        $wisata = Wisata::findOrFail($id);
    
        // Cari 3 wisata “related” berdasarkan lokasi yang sama (atau kriteria lain)
        $related = Wisata::where('lokasi', $wisata->lokasi)
                         ->where('id', '!=', $wisata->id)
                         ->latest()
                         ->take(3)
                         ->get();
    
        return view('pembeli.showwisata', compact('wisata','related'));
    }

    /**
     * Filter berdasarkan lokasi.
     */
    public function byLokasi($lokasi)
    {
        $wisatas = Wisata::where('lokasi', $lokasi)
            ->latest()
            ->paginate(6);

        // reuse sidebar data
        $lokasiList = Wisata::select('lokasi')->distinct()->pluck('lokasi');
        $lokasiCounts = Wisata::select('lokasi')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('lokasi')
            ->pluck('total', 'lokasi');
        $recentWisata = Wisata::latest()->take(5)->get();

        return view('pembeli.produk', compact(
            'wisatas',
            'lokasiList',
            'lokasiCounts',
            'recentWisata'
        ));
    }

    /**
     * Cari wisata berdasarkan kata kunci pada nama atau deskripsi.
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $wisatas = wisata::where('nama', 'like', "%{$q}%")
            ->orWhere('deskripsi', 'like', "%{$q}%")
            ->latest()
            ->paginate(6);

        $lokasiList = Wisata::select('lokasi')->distinct()->pluck('lokasi');
        $lokasiCounts = Wisata::select('lokasi')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('lokasi')
            ->pluck('total', 'lokasi');
        $recentWisata = Wisata::latest()->take(5)->get();

        return view('pembeli.produk', compact(
            'wisatas',
            'lokasiList',
            'lokasiCounts',
            'recentWisata'
        ))->with('q', $q);
    }

    public function about(){
        return view('pembeli.about');
    }
    public function form($id)
{
    $detail = detailPesanan::with('produk')->findOrFail($id);
    return view('pembeli.form_ulasan', compact('detail'));
}

public function simpan(Request $request)
{
    $request->validate([
        'detail_pesanan_id' => 'required|exists:detail_pesanan,id',
        'isi_ulasan' => 'required|string|max:255',
        'rating' => 'required|integer|min:1|max:5'
    ]);

    $detail = detailPesanan::with('produk')->findOrFail($request->detail_pesanan_id);

    ulasan::create([
        'detail_pesanan_id' => $request->detail_pesanan_id,
        'produk_id' => $detail->produk_id,
        'user_id' => Auth::id(),
        'isi' => $request->isi_ulasan,
        'rating' => $request->rating,
        'verifikasi' => false,
    ]);

    return redirect()->route('pembeli.detailpesanan')->with('success', 'Ulasan berhasil dikirim.');
}
public function profil()
{
    $user = Auth::user();
    return view('pembeli.profil', compact('user'));
}

public function konfirmasi($id)
{
    $pesanan = pesanan::findOrFail($id);
    
    if ($pesanan->pembayaran->status === 'disetujui' && $pesanan->status_konfirmasi !== 'selesai') {
        $pesanan->status_konfirmasi = 'selesai';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan telah dikonfirmasi sampai.');
    }
    }
}