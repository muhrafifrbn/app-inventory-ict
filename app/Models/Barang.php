<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailNotaMasukPengadaan;

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
    public function DetailNotaMasukPengadaan(){
        return $this->hasMany(DetailNotaMasukPengadaan::class, "kd_barang", "kd_barang");
    }

}
