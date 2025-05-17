<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\wisata;
use Illuminate\Http\Request;

class Tamucontroller extends Controller
{
    public function beranda(){
        return view('Tamu.beranda');
    }
    public function about(){
        return view('Tamu.about');
    }
    public function produk()
    {
        $produks = produk::latest()->get();
        return view('tamu.produk', compact('produks'));
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

        return view('tamu.wisata', compact(
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

}
