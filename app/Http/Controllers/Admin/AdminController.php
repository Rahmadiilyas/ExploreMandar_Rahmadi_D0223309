<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detailPesanan;
use App\Models\kategori;
use App\Models\pembayaran;
use App\Models\pengguna;
use App\Models\pesanan;
use App\Models\produk;
use App\Models\ulasan;
use App\Models\User;
use App\Models\wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function tambahuser(){
        return view('admin.tambahuser');
    }
    public function lihatuser(){
        $user = pengguna::all();
        return view('admin.lihatuser', compact('user'));
    }
    public function simpanuser(Request $request){

         $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email',
        'password' => 'required|min:6',
        'role' => 'required|string',
        'alamat' => 'required|string|max:255',
        'nomor_telepon' => 'required|digits_between:10,15',
    ]);
        pengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // bcrypt
            'role' => $request->role,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);


        return redirect()->route('admin.lihatuser')->with('success', 'User berhasil ditambahkan.');;
    }
    public function edituser($id){
        $user = pengguna::find($id);
        return view('admin.edituser', compact('user'));
    }
    public function updateuser(Request $request, $id){
        pengguna::where('id', $id)->update($request->only(['name','email','password','role','alamat','nomor_telepon']));
        return redirect()->route('admin.lihatuser');
    }
    public function deleteuser($id){
        $dosen = pengguna::find($id);
        $dosen->delete();
        return redirect()->route('admin.lihatuser');
    }


    //kategori
    public function lihatkategori(){
        $kategori = kategori::all();
        return view('admin.lihatkategori', compact('kategori'));
    }

    //produk
  
    public function lihatproduk()
    {
        $produk = produk::with('user', 'kategori')->get();
        return view('admin.lihatproduk', compact('produk'));
    }

    //pesanan
    public function lihatpesanan(){
        $pesanan = detailPesanan::with('pesanan.user')->get();
        return view('admin.lihatpesanan', compact('pesanan'));
    }
 
    // pembayaran

public function lihatlaporan()
{
    $pembayaran = pembayaran::with('pesanan')->get(); // Mengambil semua data pembayaran beserta pesanan terkait
    return view('admin.lihatlaporan', compact('pembayaran'));
}

//ulasan
public function lihatUlasan()
{
    $ulasan = ulasan::with(['produk', 'user'])->get();
    return view('admin.lihatulasan', compact('ulasan'));
}


    public function lihatwisata(){
        $wisata = wisata::all();
        return view('admin.lihatwisata', compact('wisata'));
    }

}
