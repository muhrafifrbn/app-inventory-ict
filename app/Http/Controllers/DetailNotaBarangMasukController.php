<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Barang;
use App\Models\Gudang;
use Illuminate\Http\Request;
use App\Models\NotaMasukPengadaan;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailNotaBarangMasuk;
use Illuminate\Support\Facades\Storage;

class DetailNotaBarangMasukController extends Controller
{
    public function index($no_referensi){
        $no_referensi = str_replace("-", "/", $no_referensi);
        $dataNota = NotaMasukPengadaan::where("no_referensi", $no_referensi)->with("detailNotaBarangMasuk")->first();

        $barang = Barang::all();
        $gudang = Gudang::all();
        $merek = Merek::all();

        $title = 'Hapus Data';
        $text = "Yakin Data Ingin Dihapus?";
        confirmDelete($title, $text);
        return view("dashboard.notaMasuk.detail", [
            "no_referensi" => $no_referensi,
            "detailNota" => $dataNota-> detailNotaBarangMasuk,
            "gudang" => $gudang,
            "barang" => $barang,
            "merek" => $merek
        ]);
        
    }

    public function store(Request $request){
        $resultValiation = $request->validate([
            "kd_barang" => ["required"],
            "kd_gudang" => ["required"],
            "kd_merek" => ["required"],
            'jumlah'  => 'required|integer|min:1',
            'file'    => 'required|image|mimes:jpeg,png,jpg|max:5048', // maksimal 5MB
            'keterangan'  => 'required|string|max:255',
        ]);

        $no_referensi = $request->no_referensi;

        $file = $request->file("file");
        $nameFile = $file->hashName();
        $resultFile = $file->storeAs("notaMasuk", $nameFile, "public");
        $resultValiation["foto_barang"] = $resultFile;
        $resultValiation["user_nim_nip"] = Auth::user()->nim_nip;
        $resultValiation["total_barang_baru"] = $resultValiation["jumlah"];
        $resultValiation["no_referensi"] = $no_referensi;
        

        DetailNotaBarangMasuk::create($resultValiation);

        alert()->success("Sukses", "Data Berhasil Ditambahkan");

        return \redirect()->route("detail.pengadaan", str_replace("/", "-", $no_referensi))->with("sukses", "Data Sukses Ditambahkan");

    }

      public function update(DetailNotaBarangMasuk $id, Request $request){
            
        $detailNota = $id;


        $validasi = [
            "kd_barang" => ["required"],
            "kd_gudang" => ["required"],
            "kd_merek" => ["required"],
            'jumlah'  => 'required|integer|min:1',
            'keterangan'  => 'required|string|max:255',
        ];
     
        if($request->file){
            $validasi["file"] =  'required|image|mimes:jpeg,png,jpg|max:5048';// maksimal 2MB;
        }
   

        // Validasi Semua Request Yang Masuk
        $resultValidation = $request->validate($validasi);
        
        if($request->file){
            // Hapus File Jika Ada File Yang Di Upload
            Storage::disk("public")->delete($detailNota->foto_barang);
            $file = $request->file("file");
            $nameFile = $file->hashName();
            $resultFile = $file->storeAs("notaMasuk", $nameFile, "public");
            $resultValidation["foto_barang"] = $resultFile;
        }
  
    
        alert()->success("Sukses", "Data Berhasil Dirubah");
        $detailNota->update($resultValidation);

        return \redirect()->route("detail.pengadaan", str_replace("/", "-", $detailNota->no_referensi))->with("sukses", "Nota Berhasil Dirubah");

    }

    public function destroy(DetailNotaBarangMasuk $id){
        $no_referensi  = $id->no_referensi;
        DetailNotaBarangMasuk::destroy($id->id);
        alert()->success("Sukses", "Data Berhasil Dihapus!");
        return \redirect()->route("detail.pengadaan", str_replace("/", "-", $no_referensi));

    }
}
