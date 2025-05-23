<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\DetailGudang;
use Illuminate\Http\Request;

class DetailGudangController extends Controller
{
    public function index(){
        $ruangGudang = Gudang::all();   
        return view("dashboard.gudang", ["ruangGudang" => $ruangGudang]);
    }

    public function detail(Gudang $kd_gudang){
        $title = 'Hapus Data';
        $text = "Yakin Data Ingin Dihapus?";
        confirmDelete($title, $text);
        $barang = Barang::all();
        $merek = Merek::all();
        $gudang= $kd_gudang;
        $namaGudang =  $gudang->nama_gudang;
        $detailGudang = DetailGudang::where("kd_gudang", $gudang->kd_gudang)->paginate(8);
        $gudang = Gudang::all();
        return view("detailGudang.detail", ["detailGudang" => $detailGudang , "barang" => $barang, "gudang" => $gudang, "merek" => $merek, "namaGudang" => $namaGudang]);
    }

    public function hapusDetail(DetailGudang $id){
        $detailGudang = $id;
        return $detailGudang->detailNotaMasuk;
    }

    public function update(DetailGudang $id, Request $request ){
        $detailGudang = $id;
        $kodeGudang = $detailGudang->gudang->kd_gudang;
        $validasi = [
            "kd_barang" => ["required"],
            "kd_gudang" => ["required"],
            "kd_merek" => ["required"],
            'keterangan'  => 'required|string|max:255',
        ];

        if($request->kode_lab){
            $validasi["kode_lab"] = ["required"];
        }

        if($request->kode_lab){
            $validasi["kode_iventaris"] = ["required"];
        }
     
        if($request->file){
            $validasi["file"] =  'required|image|mimes:jpeg,png,jpg|max:5048';// maksimal 2MB;
        }
   

        // Validasi Semua Request Yang Masuk
        $resultValidation = $request->validate($validasi);
        
        if($request->file){
            // Hapus File Jika Ada File Yang Di Upload
            Storage::disk("public")->delete($detailGudang->foto_barang);
            $file = $request->file("file");
            $nameFile = $file->hashName();
            $resultFile = $file->storeAs("fotoBarang", $nameFile, "public");
            $resultValidation["foto_barang"] = $resultFile;
        }
  
    
        alert()->success("Sukses", "Data Berhasil Dirubah");
        $detailGudang->update($resultValidation);

        return \redirect()->route("gudang.home", $kodeGudang);
    }

    
}
