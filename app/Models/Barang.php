<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailNotaBarangMasuk;

class Barang extends Model
{
    
    protected $table = "barang";
    protected $primaryKey = 'kd_barang';
    public $incrementing = false; 
    protected $keyType = 'string'; 

     protected $fillable = [
       "kd_barang",
       "nama_barang"
    ];

     // Terhubung ke table Detail Nota Barang Masuk
    public function detailNotaMasukPengadaan(){
        return $this->hasMany(DetailNotaBarangMasuk::class, "kd_barang", "kd_barang");
    }


    // Terhubung ke table Detail Gudang
    public function detailGudang(){
        return $this->hasMany(DetailGudang::class, "kd_barang", "kd_barang");
    }

}
