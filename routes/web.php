<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotaMasukPengadaanController;
use App\Http\Controllers\RegistrasiController;
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
    Route::get("/notaBarang", fn() => view("dashboard.notaBarang"));
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

// Route Gudang
Route::middleware(["auth"])->controller(GudangController::class)->group(function(){
    Route::get("/gudang", "index");
});

// Route Barang
Route::middleware(["auth"])->controller(BarangController::class)->group(function(){
    Route::get("/dataKeperluan/barang", "index")->name("barang");
    Route::post("/dataKeperluan/barang", "store")->name("barang.store");
    Route::put("/dataKeperluan/barang/{kd_barang}", "update")->name("barang.update");
    Route::delete("/dataKeperluan/barang/{kd_barang}", "destroy")->name("barang.hapus");
});

