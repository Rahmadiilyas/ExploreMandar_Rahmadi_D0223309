<?php

namespace App\Http\Controllers\kreator;

use App\Http\Controllers\Controller;
use App\Models\detailpesanan;
use App\Models\kategori;
use App\Models\pembayaran;
use App\Models\pengguna;
use App\Models\pesanan;
use App\Models\produk;
use App\Models\ulasan;
use App\Models\wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class kreatorController extends Controller
{
    public function index()
    {
        return view('kreator.dashboard');
    }
    public function tambahproduk()
    {
        $kategori = kategori::all();
        $user = pengguna::all(); // Ambil semua user dari database
        return view('kreator.tambahproduk', compact('user', 'kategori'));
    }
    public function lihatproduk()
    {
        $produk = produk::with('user', 'kategori')->get();
        return view('kreator.lihatproduk', compact('produk'));
    }
    public function simpanproduk(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'user_id' => 'required|exists:users,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'kategori_id' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,jpeg,png',
            'stok' => 'required|integer',
        ]);
    
        // Simpan file
        $gambar = $request->file('gambar')->store('gambar-produk', 'public');
    
        // Simpan ke database
        produk::create([
            'nama' => $request->nama,
            'user_id' => $request->user_id,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambar,
            'stok' => $request->stok,
        ]);
    
        return redirect()->route('kreator.lihatproduk')->with('success', 'Produk berhasil disimpan');
    }
    
    public function editproduk($id)
    {
        $produk = produk::find($id);
        return view("kreator.editproduk", compact('produk'));
    }
    public function updateproduk(Request $request, $id)
    {
        $produk = produk::findOrFail($id);
    
        $data = $request->only('nama', 'user_id', 'harga', 'deskripsi', 'kategori_id', 'stok');
    
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpg,jpeg,png',
            ]);
            $gambar = $request->file('gambar')->store('gambar-produk', 'public');
            $data['gambar'] = $gambar;
        }
    
        $produk->update($data);
        return redirect()->route('kreator.lihatproduk')->with('success', 'Produk berhasil diperbarui');
    }

    public function deleteproduk($id)
    {
        $produk = produk::find($id);
        $produk->delete();
        return redirect()->route('kreator.lihatproduk');
    }
    public function tambahkategori() {
        return view('kreator.tambahkategori');
    }

    public function lihatkategori()
    {
        $kategori = kategori::all();
        return view('kreator.lihatkategori', compact('kategori'));
    }
    public function simpankategori(Request $request){
        kategori::create($request->only('nama'));
        return redirect()->route('kreator.lihatkategori');
    }
    public function editkategori($id){
        $kategori = kategori::find($id);
        return view('kreator.editkategori', compact('kategori'));
    }
    public function updatekategori(Request $request, $id){
        kategori::where('id', $id)->update($request->only('nama'));
        return redirect()->route('kreator.lihatkategori');
    }
    public function deletekategori($id){
        $kategori = kategori::find($id);
        $kategori->delete();
        return redirect()->route('kreator.lihatkategori');
    }

    // wisata
    public function tambahwisata(){
        return view('kreator.tambahwisata');
    }
    
    public function lihatwisata(){
        $wisata = wisata::all();
        return view('kreator.lihatwisata', compact('wisata'));
    }
    
    public function simpanwisata(Request $request){
     
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $gambar = $request->file('gambar')->store('gambar-wisata', 'public');
      
        wisata::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);
        return redirect()->route('kreator.lihatwisata')->with('success', 'Wisata berhasil ditambahkan');
    }
    
    public function editwisata($id)
    {
        $wisata = wisata::findOrFail($id);
        return view('kreator.editwisata', compact('wisata'));
    }
    
    public function updatewisata(Request $request, $id)
    {
        $wisata = wisata::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if ($request->hasFile('gambar')) {
            if ($wisata->gambar && Storage::disk('public')->exists($wisata->gambar)) {
                Storage::disk('public')->delete($wisata->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar-wisata', 'public');
        }
    
        $wisata->update($data);
        return redirect()->route('kreator.lihatwisata')->with('success', 'Wisata berhasil diperbarui');
    }
    
    public function deletewisata($id)
    {
        $wisata = wisata::findOrFail($id);
        if ($wisata->gambar && Storage::disk('public')->exists($wisata->gambar)) {
            Storage::disk('public')->delete($wisata->gambar);
        }
        $wisata->delete();
        return redirect()->route('kreator.lihatwisata')->with('success', 'Wisata berhasil dihapus');
    }
    

// ulasan
public function lihatulasan(){
    $ulasan = ulasan::with('user', 'produk')->get();
    return view('kreator.lihatulasan', compact('ulasan'));

}
public function daftarPembayaran()
{
    $pembayaran = pembayaran::with('pesanan.user')->where('status', 'menunggu')->get();
    return view('kreator.validasipesanan', compact('pembayaran'));
}

public function validasiPembayaran($id)
{
    $pembayaran = pembayaran::findOrFail($id);
    
    // Update status pembayaran
    $pembayaran->update(['status' => 'disetujui']);

    // Update status pesanan
    $pembayaran->pesanan->update(['status' => 'dikirim']);

    return redirect()->back()->with('success', 'Pembayaran telah divalidasi dan pesanan dikirim.');
}
public function tolakPembayaran($id)
{
    $pembayaran = pembayaran::findOrFail($id);

    // Update status pembayaran menjadi ditolak
    $pembayaran->update(['status' => 'ditolak']);

    // Update status pesanan
    $pembayaran->pesanan->update(['status' => 'dibatalkan']);

    return redirect()->back()->with('success', 'Pembayaran ditolak dan pesanan dibatalkan.');
}
}