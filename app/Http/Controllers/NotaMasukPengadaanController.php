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
        $title = 'Hapus Data';
        $text = "Yakin Data Ingin Dihapus?";
        confirmDelete($title, $text);
        $notaMasuk = NotaMasukPengadaan::where("status_nota", "Nota Masuk")->get();
        return view("dashboard.notaMasuk.pengadaan", ["notaMasuk" => $notaMasuk]);
    }

    public function store(Request $request){
        $resultValidate = $request->validate([
            "no_referensi" => ["required", "unique:nota_pengadaan"],
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
        $resultValidate["dokumen_nota_barang"] = $resultFile;
        $resultValidate["user_nim_nip"] = Auth::user()->nim_nip;
        $resultValidate["tanggal"] = Carbon::createFromFormat('m/d/Y', $resultValidate["tanggal"])->format('Y-m-d');
        $resultValidate["status_nota"] = "Nota Masuk";

        alert()->success("Sukses", "Data Berhasil Ditambahkan");
        NotaMasukPengadaan::create($resultValidate);
        
        return \redirect("/notaBarang/notaMasukPengadaan");
    }

    public function edit($no_referensi, Request $request){
        $no_referensi = str_replace("-", "/", $no_referensi);
        $dataNota = NotaMasukPengadaan::where("no_referensi", $no_referensi)->first();
        $validasi = [
            "jam" => ["required"]
        ];
        if($request->no_referensi != $dataNota->no_referensi){
            $validasi["no_referensi"] = ["required", "unique:nota_pengadaan"];
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
            Storage::disk("public")->delete($dataNota->dokumen_nota_barang);
            $file = $request->file("file");
            $nameFile = $file->hashName();
            $resultFile = $file->storeAs("notaMasuk", $nameFile, "public");
            $resultValidation["dokumen_nota_barang"] = $resultFile;
        }
  
        if($request->tanggal){
            $resultValidation["tanggal"] = Carbon::createFromFormat('m/d/Y', $resultValidation["tanggal"])->format('Y-m-d');
            // Konversi tanggal ke hari
            $tanggal = Carbon::parse($resultValidation['tanggal']);
            $resultValidation["hari"] = $tanggal->translatedFormat('l');
        }

     
        alert()->success("Sukses", "Data Berhasil Dirubah");
        $dataNota->update($resultValidation);

        return \redirect()->route("notaMasukPengadaan.index");

    }
    
    public function destroy( $no_referensi){
        $no_referensi = str_replace("-", "/", $no_referensi);
        $dataNota = NotaMasukPengadaan::where("no_referensi", $no_referensi)->first();
        Storage::disk('public')->delete($dataNota->dokumen_nota_barang);
        alert()->success("Sukses", "Data Berhasil Dihapus");
        NotaMasukPengadaan::destroy($no_referensi);
        return redirect("/notaBarang/notaMasukPengadaan") ;
    }

    public function indexDetail(){
        $notaMasuk = NotaMasukPengadaan::all();
        return view("dashboard.notaMasuk.detailPengadaan", ["notaMasuk" => $notaMasuk]);
    }
}
