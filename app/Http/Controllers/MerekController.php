<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merek;

class MerekController extends Controller
{
    public function index(){
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $merek = Merek::all();
        return view("dashboard.dataKeperluan.merek.index", ["merek"=> $merek]);
    }

    public function store(Request $request){
       $resultValidation = $request->validate([
        "kd_merek" => 'required|unique:merek,kd_merek',
        'nama_merek' => 'required|string|max:255',
       ]);

       Merek::create($resultValidation);


       alert()->success("Sukses", "Data Berhasil Ditambahkan");

       return \redirect()->route("merek")->with("sukses", "Data Sukses Ditambahkan");
    }

    public function update($kd_merek, Request $request){
        $datamerek = Merek::find($kd_merek);
        $resultValidation = [
             'nama_merek' => 'required|string|max:255'
        ];
        if($datamerek->kd_merek != $request->kd_merek){
            $resultValidation["kd_merek"] = 'required|unique:merek,kd_merek';
        }

        $resultValidation = $request->validate($resultValidation);

        alert()->success("Sukses", "Data Berhasil Dirubah!");
        Merek::where("kd_merek", $datamerek->kd_merek)->update($resultValidation);
        
        return \redirect()->route("merek");

    }

    public function destroy($kd_merek){
        alert()->success("Sukses", "Data Berhasil Dihapus");
        Merek::destroy($kd_merek);
        return \redirect()->route("merek");
    }
}
