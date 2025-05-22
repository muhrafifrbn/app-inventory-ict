<?php

namespace App\Models;

use App\Models\User;
use App\Models\Merek;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\NotaMasukPengadaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailNotaBarangMasuk extends Model
{
    /** @use HasFactory<\Database\Factories\DetailNotaBarangMasukFactory> */
    use HasFactory;

     
    protected $table = "detail_nota_barang_masuk";
    
    protected $fillable = [
       "no_referensi",
       "kd_gudang",
       "kd_merek",
       "kd_barang",
       "user_nim_nip",
       "total_barang_baru",
       "foto_barang",
       "keterangan"
    ];
  
    // Terhubung ke table Nota Masuk
    public function notaMasukPengadaan(){
        return $this->belongsTo(NotaMasukPengadaan::class, "no_referensi", "no_referensi");
    }
     
    // Terhubung ke table gudang
    public function gudang(){
        return $this->belongsTo(Gudang::class, "kd_gudang", "kd_gudang");
    }

    // Terhubung ke table barang
    public function barang(){
        return $this->belongsTo(Barang::class, "kd_barang", "kd_barang");
    }

    // Terhubung ke table users
    public function user(){
        return $this->belongsTo(User::class, "user_nim_nip", "nim_nip");
    }

     // Terhubung ke table users
    public function merek(){
        return $this->belongsTo(Merek::class, "kd_merek", "kd_merek");
    }
}
