<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\NotaMasukPengadaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NotaMasukPengadaanController extends Controller
{
    public function index(){
        $notaMasuk = NotaMasukPengadaan::all();
        return view("dashboard.notaMasuk.pengadaan", ["notaMasuk" => $notaMasuk]);
    }

    public function store(Request $request){
        $resultValidate = $request->validate([
            "no_referensi" => ["required", "unique:nota_masuk_pengadaan"],
            "tanggal" => ["date", "required"],
            "file" => ["file","max:2048", "required", "mimes:pdf"],
            "jam" => ["required"]
        ]);

            // Konversi tanggal ke hari
            $tanggal = Carbon::parse($resultValidate['tanggal']);
            $resultValidate["hari"] = $tanggal->translatedFormat('l');

        $file = $request->file("file");
        $nameFile = $file->hashName();
        $resultFile = $file->storeAs("notaMasuk", $nameFile, "public");
        $resultValidate["dokumen_nota_barang_masuk"] = $resultFile;
        $resultValidate["user_nim_nip"] = Auth::user()->nim_nip;
        $resultValidate["tanggal"] = Carbon::createFromFormat('m/d/Y', $resultValidate["tanggal"])->format('Y-m-d');

        NotaMasukPengadaan::create($resultValidate);
        
        return \redirect("/notaBarang/notaMasukPengadaan")->with("sukses", "Nota Berhasil Ditambahkan");
    }

    public function edit($no_referensi, Request $request){
        $no_referensi = str_replace("-", "/", $no_referensi);
        return $request;
    }
    
    public function destroy( $no_referensi){
        $no_referensi = str_replace("-", "/", $no_referensi);
        $dataNota = NotaMasukPengadaan::where("no_referensi", $no_referensi)->first();
        Storage::disk('public')->delete($dataNota->dokumen_nota_barang_masuk);
        NotaMasukPengadaan::destroy($no_referensi);
        return redirect("/notaBarang/notaMasukPengadaan")->with("sukses", "Nota Berhasil Dihapus");
    }

    public function indexDetail(){
        $notaMasuk = NotaMasukPengadaan::all();
        return view("dashboard.notaMasuk.detailPengadaan", ["notaMasuk" => $notaMasuk]);
    }
}
