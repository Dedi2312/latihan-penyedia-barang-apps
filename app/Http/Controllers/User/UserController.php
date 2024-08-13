<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){

        $produk = Produk::all();

        return view('home',compact('produk'));
    }
}
