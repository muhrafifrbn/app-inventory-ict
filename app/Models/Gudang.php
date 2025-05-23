<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailNotaBarangMasuk;

class Gudang extends Model
{
    /** @use HasFactory<\Database\Factories\GudangFactory> */
    use HasFactory;

    protected $table = "gudang";
    protected $primaryKey = 'kd_gudang';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
       "kd_gudang",
       "nama_gudang"
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
