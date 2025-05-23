<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index(){
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $ruang = Ruang::all();
        return view("dashboard.dataKeperluan.ruang.index", ["ruang"=> $ruang]);
    }

    public function store(Request $request){
       $resultValidation = $request->validate([
        "kd_ruang" => 'required|unique:ruang,kd_ruang',
        'nama_ruang' => 'required|string|max:255',
       ]);

       Ruang::create($resultValidation);

       alert()->success("Sukses", "Data Berhasil Ditambahkan");

       return \redirect()->route("ruang")->with("sukses", "Data Sukses Ditambahkan");
    }

    public function update($kd_ruang, Request $request){
        $dataruang = ruang::find($kd_ruang);
        $resultValidation = [
             'nama_ruang' => 'required|string|max:255'
        ];
        if($dataruang->kd_ruang != $request->kd_ruang){
            $resultValidation["kd_ruang"] = 'required|unique:ruang,kd_ruang';
        }

        $resultValidation = $request->validate($resultValidation);
        alert()->success("Sukses", "Data Berhasil Dirubah!");
        ruang::where("kd_ruang", $dataruang->kd_ruang)->update($resultValidation);
        return \redirect()->route("ruang");

    }

    public function destroy($kd_ruang){
        alert()->success("Sukses", "Data Berhasil Dihapus");
        ruang::destroy($kd_ruang);
        return \redirect()->route("ruang");
    }
}
