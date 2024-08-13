<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $produkAktif = DB::table('produks')->where('status', 'aktif')->count();
        $totalUser = DB::table('users')->where('role', 'user')->count();
        $userAktif = DB::table('users')->where('role', 'user')->where('status', 'aktif')->count();

        $produk = Produk::all();
        $pengguna = User::all()->where('role','user');

        return view('admin.dashboard',compact('totalProduk','produkAktif','totalUser','userAktif','pengguna','produk'));
    }

    public function produk(){
        $produk = Produk::all();

        return view('admin.produk', compact('produk'));
    }

    function storeProduk(Request $request)
    {
        //validate form
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:3',
            'keterangan' => 'required|string',
            'status' => 'required|in:aktif,non-aktif',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

         //upload image
         $img = $request->file('img');
         $img->storeAs('public/produks', $img->hashName());

        //create
        Produk::create([
            'img'         => $img->hashName(),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        //redirect to index
        return redirect()->route('admin.produk')->with('success','tambah data berhasil!');
    }

    public function updateProduk(Request $request, $id): RedirectResponse
    {
        //validate form
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:3',
            'keterangan' => 'required|string',
            'status' => 'required|in:aktif,non-aktif',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        //get product by ID
        $produk = produk::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('img')) {

            //upload new img
            $img = $request->file('img');
            $img->storeAs('public/produks', $img->hashName());

            //delete old img
            Storage::delete('public/produks/'.$produk->img);

            //update produk with new img
            $produk->update([
                'img'         => $img->hashName(),
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
            ]);

        } else {

            //update product without img
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
            ]);
        }

        //redirect to index
        return redirect()->route('admin.produk')->with('success','tambah data berhasil!');
    }

    public function hapusProduk($id): RedirectResponse
    {
        //get produk by ID
        $produk = produk::findOrFail($id);

        //delete image
        Storage::delete('public/produks/'. $produk->img);

        //delete produk
        $produk->delete();

        //redirect to index
        return redirect()->route('admin.produk')->with('success','tambah data berhasil!');
    }
}