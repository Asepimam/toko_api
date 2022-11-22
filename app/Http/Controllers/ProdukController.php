<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
class ProdukController extends Controller
{
    public function create(Request $request){
        $kodeProduk = $request->input('kode_produk');
        $namaProduk = $request->input('nama_produk');
        $harga = $request->input('harga');

        $produk = Produk::create([
            'kode_produk' => $kodeProduk,
            'nama_produk' => $namaProduk,
            'harga' => $harga
        ]);
        return $this->hasilRespons(200,true,$produk);
    }

    public function alllist(){
        $produk = Produk::all();
        return $this->hasilRespons(200,true,$produk);
    }
    public function show($id){
        $produk = Produk::findOrFail($id);
        return $this->hasilRespons(200,true,$produk);
    }
    public function update(Request $request,$id){
        $kodeProduk = $request->input('kode_produk');
        $namaProduk = $request->input('nama_produk');
        $harga = $request->input('harga');

        $produk = Produk::findOrFail($id);
        $result = $produk->update([
            'kode_produk' => $kodeProduk,
            'nama_produk' => $namaProduk,
            'harga' => $harga
        ]);
        return $this->hasilRespons(200,true,$result);
    }
    public function delete($id){
        $produk = Produk::findOrFail($id);
        $result = $produk->delete();
        return $this->hasilRespons(200,true,$result);
    }
}