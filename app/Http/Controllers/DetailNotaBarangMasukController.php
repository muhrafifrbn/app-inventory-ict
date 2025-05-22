<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Barang;
use App\Models\Gudang;
use Illuminate\Http\Request;
use App\Models\NotaMasukPengadaan;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailNotaBarangMasuk;

class DetailNotaBarangMasukController extends Controller
{
    public function index($no_referensi){
        $no_referensi = str_replace("-", "/", $no_referensi);
        $dataNota = NotaMasukPengadaan::where("no_referensi", $no_referensi)->with("detailNotaBarangMasuk")->first();

        $barang = Barang::all();
        $gudang = Gudang::all();
        $merek = Merek::all();
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
            "file" => ["file","max:2048", "required", "image"],
            'jumlah'  => 'required|integer|min:1',
            'file'    => 'required|image|mimes:jpeg,png,jpg|max:5048', // maksimal 2MB
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

        return \redirect()->route("detail.pengadaan", $no_referensi)->with("sukses", "Data Sukses Ditambahkan");

    }
}
