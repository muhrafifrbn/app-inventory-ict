<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\NotaMasukPengadaanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DetailNotaBarangMasukController;
use App\Http\Controllers\BarangController;
use App\Models\Gudang;
use App\Models\NotaMasukPengadaan;
use Illuminate\Support\Facades\Route;

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
        $notaMasuk = count( NotaMasukPengadaan::all());
        return view('dashboard.notaBarang', ["notaMasuk" => $notaMasuk]);
    });
    Route::get("/dataKeperluan", fn() => view("dashboard.dataKeperluan.index"))->name("dataKeperluan");
});

// Route Nota Pengadaan
Route::middleware(["auth"])->controller(NotaMasukPengadaanController::class)->group(function(){
    Route::get("/notaBarang/notaMasukPengadaan", "index")->name("notaMasukPengadaan.index");
    Route::post("/notaMasukPengadaan", "store");
    Route::put("/notaMasukPengadaan/{no_referensi}", "edit");
    Route::delete("/notaMasukPengadaan/{no_referensi}", "destroy");
    Route::get("/notaBarang/notaDetailMasukPengadaan/", "indexDetail")->name("detail.pengadaan");
});

// Route Detail Nota Masuk
Route::middleware(["auth"])->controller(DetailNotaBarangMasukController::class)->group(function(){
    Route::get("/notaBarang/notaDetailMasukPengadaan/{no_referensi}", "index")->name("detail.pengadaan");
    Route::post("/notaBarang/notaDetailMasukPengadaan", "store")->name("detail.store");
    Route::delete("/notaBarang/notaDetailMasukPengadaan/{id}", "destroy")->name("detail.hapus");
    Route::put("/notaBarang/notaDetailMasukPengadaan/{id}", "update")->name("detail.update");
});


// Route Gudang
// Route::middleware(["auth"])->controller(GudangController::class)->group(function(){
//     Route::get("/gudang", "index");
// });

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

