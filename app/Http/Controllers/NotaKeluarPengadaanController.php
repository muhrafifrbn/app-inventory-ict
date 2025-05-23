<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\NotaMasukPengadaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NotaKeluarPengadaanController extends Controller
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
        $resultValidate["status_nota"] = "Nota Keluar";

        NotaMasukPengadaan::create($resultValidate);
        
        
        return \redirect("/notaBarang/notaMasukPengadaan")->with("sukses", "Nota Berhasil Ditambahkan");
    }

    public function edit($no_referensi, Request $request){
        $no_referensi = str_replace("-", "/", $no_referensi);
        $dataNota = NotaMasukPengadaan::where("no_referensi", $no_referensi)->first();
        $validasi = [
            "jam" => ["required"]
        ];
        if($request->no_referensi != $dataNota->no_referensi){
            $validasi["no_referensi"] = ["required", "unique:nota_masuk_pengadaan"];
        }
        if($request->file){
            $validasi["file"] = ["file","max:2048", "mimes:pdf"];
        }
        if($request->tanggal){
            $validasi["tanggal"] = ["date", "required"];
        }

        // Validasi Semua Request Yang Masuk
        $resultValidation = $request->validate($validasi);
        
        if($request->file){
            // Hapus File Jika Ada File Yang Di Upload
            Storage::disk("public")->delete($dataNota->dokumen_nota_barang_masuk);
            $file = $request->file("file");
            $nameFile = $file->hashName();
            $resultFile = $file->storeAs("notaMasuk", $nameFile, "public");
            $resultValidation["dokumen_nota_barang_masuk"] = $resultFile;
        }
  
        if($request->tanggal){
            $resultValidation["tanggal"] = Carbon::createFromFormat('m/d/Y', $resultValidation["tanggal"])->format('Y-m-d');
            // Konversi tanggal ke hari
            $tanggal = Carbon::parse($resultValidation['tanggal']);
            $resultValidation["hari"] = $tanggal->translatedFormat('l');
        }

     
        $dataNota->update($resultValidation);

        return \redirect()->route("notaMasukPengadaan.index")->with("sukses", "Nota Berhasil Dirubah");

      
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
