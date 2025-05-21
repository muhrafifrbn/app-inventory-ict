<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view("dashboard.dataKeperluan.barang.index", ["barang"=> $barang]);
    }

    public function store(Request $request){
       $resultValidation = $request->validate([
        "kd_barangi" => 'required|unique:barang,kd_barang',
        'nama_barang' => 'required|string|max:255',
       ]);

       Barang::create($resultValidation);

       return \redirect("")->name("barang")->with("sukses", "Data Sukses Ditambahkan");
    }
}
