<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $barang = Barang::all();
        return view("dashboard.dataKeperluan.barang.index", ["barang"=> $barang]);
    }

    public function store(Request $request){
       $resultValidation = $request->validate([
        "kd_barang" => 'required|unique:barang,kd_barang',
        'nama_barang' => 'required|string|max:255',
       ]);

       Barang::create($resultValidation);


       alert()->success("Sukses", "Data Berhasil Ditambahkan");

       return \redirect()->route("barang")->with("sukses", "Data Sukses Ditambahkan");
    }

    public function update($kd_barang, Request $request){
        $dataBarang = Barang::find($kd_barang);
        $resultValidation = [
             'nama_barang' => 'required|string|max:255'
        ];
        if($dataBarang->kd_barang != $request->kd_barang){
            $resultValidation["kd_barang"] = 'required|unique:barang,kd_barang';
        }

        $resultValidation = $request->validate($resultValidation);

        alert()->success("Sukses", "Data Berhasil Dirubah!");
        Barang::where("kd_barang", $dataBarang->kd_barang)->update($resultValidation);
        
        return \redirect()->route("barang");

    }

    public function destroy($kd_barang){
        alert()->success("Sukses", "Data Berhasil Dihapus");
        Barang::destroy($kd_barang);
        return \redirect()->route("barang");
    }
}
