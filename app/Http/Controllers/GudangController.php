<?php

namespace App\Http\Controllers;

use App\Models\DetailGudang;
use Illuminate\Http\Request;
use App\Models\NotaMasukPengadaan;
use App\Models\Gudang;

class GudangController extends Controller
{
    public function index(){
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $gudang = Gudang::all();
        return view("dashboard.dataKeperluan.gudang.index", ["gudang"=> $gudang]);
    }

    public function store(Request $request){
       $resultValidation = $request->validate([
        "kd_gudang" => 'required|unique:gudang,kd_gudang',
        'nama_gudang' => 'required|string|max:255',
       ]);

       gudang::create($resultValidation);


       alert()->success("Sukses", "Data Berhasil Ditambahkan");

       return \redirect()->route("gudang")->with("sukses", "Data Sukses Ditambahkan");
    }

    public function update($kd_gudang, Request $request){
        $datagudang = Gudang::find($kd_gudang);
        $resultValidation = [
             'nama_gudang' => 'required|string|max:255'
        ];
        if($datagudang->kd_gudang != $request->kd_gudang){
            $resultValidation["kd_gudang"] = 'required|unique:gudang,kd_gudang';
        }

        $resultValidation = $request->validate($resultValidation);

        alert()->success("Sukses", "Data Berhasil Dirubah!");
        gudang::where("kd_gudang", $datagudang->kd_gudang)->update($resultValidation);
        
        return \redirect()->route("gudang");

    }

    public function destroy($kd_gudang){
        alert()->success("Sukses", "Data Berhasil Dihapus");
        gudang::destroy($kd_gudang);
        return \redirect()->route("gudang");
    }

    public function home(){
        $ruangGudang = Gudang::all();
        return view("dashboard.gudang", ["ruangGudang" => $ruangGudang]);
    }

    public function detail(Gudang $kd_gudang){
        $gudang= $kd_gudang;
        $detailGudang = DetailGudang::where("kd_gudang", $gudang->kd_gudang)->paginate(8);
        return view("detailGudang.detail", ["detailGudang" => $detailGudang, "gudang" => $gudang]);
    }

    public function hapusDetail(Gudang $kd_gudang){
        $detailGudang = $kd_gudang;
        return $detailGudang;
    }

    
}