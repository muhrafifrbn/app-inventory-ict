<?php

namespace App\Models;

use App\Models\DetailGudang;
use App\Models\DetailNotaBarangMasuk;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = "merek";
    protected $primaryKey = 'kd_merek';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
       "kd_merek",
       "nama_merek"
    ];

    // Terhubung ke table Detail Nota Barang Masuk
    public function detailNotaMasukPengadaan(){
        return $this->hasMany(DetailNotaBarangMasuk::class, "kd_gudang", "kd_gudang");
    }

     // Terhubung ke table Detail Gudang
    public function detailGudang(){
        return $this->hasMany(DetailGudang::class, "kd_gudang", "kd_gudang");
    }
}
