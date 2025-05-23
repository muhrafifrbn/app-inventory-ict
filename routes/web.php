<?php

use App\Http\Controllers\NotaKeluarPengadaanController;
use App\Models\Gudang;
use App\Models\NotaMasukPengadaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DetailGudangController;
use App\Http\Controllers\NotaMasukPengadaanController;
use App\Http\Controllers\DetailNotaBarangMasukController;

Route::get('/', function () {
    return view('login');
});

Route::get('/users', function () {
    return view('welcome');
});


Route::get("/login", [LoginController::class, "index"])->middleware(["guest"])->name("login");
Route::post("/login", [LoginController::class, "authenticate"])->middleware(["guest"]);
Route::get("/logout", [LoginController::class, "logout"])->middleware(["auth"]);
Route::get("/registrasi", [RegistrasiController::class, "index"])->middleware(["guest"]);
Route::post("/registrasi", [RegistrasiController::class, "store"]);

// Route Sidebar Dashboard
Route::middleware(["auth"])->group(function(){
    Route::get("/dashboard", fn() => view("dashboard.index"));
     Route::get("/notaBarang", function(){
        $notaMasuk = NotaMasukPengadaan::where("status_nota", "Nota Masuk")->get();
        $notaKeluar = NotaMasukPengadaan::where("status_nota", "Nota Keluar")->get();
        return view('dashboard.notaBarang', ["notaMasuk" => count($notaMasuk), "notaKeluar" => count($notaKeluar)]);
    });
    Route::get("/dataKeperluan", fn() => view("dashboard.dataKeperluan.index"))->name("dataKeperluan");
});

// Route Nota Masuk Pengadaan
Route::middleware(["auth"])->controller(NotaMasukPengadaanController::class)->group(function(){
    Route::get("/notaBarang/notaMasukPengadaan", "index")->name("notaMasukPengadaan.index");
    Route::post("/notaMasukPengadaan", "store");
    Route::put("/notaMasukPengadaan/{no_referensi}", "edit");
    Route::delete("/notaMasukPengadaan/{no_referensi}", "destroy")->name("notaMasukPengadaan.destroy");
    Route::get("/notaBarang/notaDetailMasukPengadaan/", "indexDetail")->name("detail.pengadaan");
});

// Route Detail Nota Masuk
Route::middleware(["auth"])->controller(DetailNotaBarangMasukController::class)->group(function(){
    Route::get("/notaBarang/notaDetailMasukPengadaan/{no_referensi}", "index")->name("detail.pengadaan");
    Route::post("/notaBarang/notaDetailMasukPengadaan", "store")->name("detail.store");
    Route::delete("/notaBarang/notaDetailMasukPengadaan/{id}", "destroy")->name("detail.hapus");
    Route::put("/notaBarang/notaDetailMasukPengadaan/{id}", "update")->name("detail.update");
});

// Route Nota Keluar Pengadaan
Route::middleware(["auth"])->controller(NotaKeluarPengadaanController::class)->group(function(){
    Route::get("/notaBarang/notaKeluarPengadaan", "index")->name("notaKeluarPengadaan.index");
    Route::post("/notaMasukPengadaan", "store");
    Route::put("/notaMasukPengadaan/{no_referensi}", "edit");
    Route::delete("/notaMasukPengadaan/{no_referensi}", "destroy")->name("notaMasukPengadaan.destroy");
    Route::get("/notaBarang/notaDetailMasukPengadaan/", "indexDetail")->name("detail.pengadaan");
});


// Route Detail Gudang
Route::middleware(["auth"])->controller(DetailGudangController::class)->group(function(){
    Route::get("/gudang", "index")->name("gudang.home");
    Route::get("/gudang/detail/{kd_gudang}", "detail")->name("gudang.detail");
    Route::delete("/gudang/detail/{id}", "hapusDetail")->name("gudang.detail.hapus");
    Route::put("/gudang/detail/{id}", "update")->name("gudang.detail.update");
});

// Route Barang
Route::middleware(["auth"])->controller(BarangController::class)->group(function(){
    Route::get("/dataKeperluan/barang", "index")->name("barang");
    Route::post("/dataKeperluan/barang", "store")->name("barang.store");
    Route::put("/dataKeperluan/barang/{kd_barang}", "update")->name("barang.update");
    Route::delete("/dataKeperluan/barang/{kd_barang}", "destroy")->name("barang.hapus");
});

// Route Gudang
Route::middleware(["auth"])->controller(GudangController::class)->group(function(){
    Route::get("/dataKeperluan/gudang", "index")->name("gudang");
    Route::post("/dataKeperluan/gudang", "store")->name("gudang.store");
    Route::put("/dataKeperluan/gudang/{kd_gudang}", "update")->name("gudang.update");
    Route::delete("/dataKeperluan/gudang/{kd_gudang}", "destroy")->name("gudang.hapus");
});

// Route Merek
Route::middleware(["auth"])->controller(MerekController::class)->group(function(){
    Route::get("/dataKeperluan/merek", "index")->name("merek");
    Route::post("/dataKeperluan/merek", "store")->name("merek.store");
    Route::put("/dataKeperluan/merek/{kd_merek}", "update")->name("merek.update");
    Route::delete("/dataKeperluan/merek/{kd_merek}", "destroy")->name("merek.hapus");
});

// Route Merek
Route::middleware(["auth"])->controller(RuangController::class)->group(function(){
    Route::get("/dataKeperluan/ruang", "index")->name("ruang");
    Route::post("/dataKeperluan/ruang", "store")->name("ruang.store");
    Route::put("/dataKeperluan/ruang/{kd_ruang}", "update")->name("ruang.update");
    Route::delete("/dataKeperluan/ruang/{kd_ruang}", "destroy")->name("ruang.hapus");
});


