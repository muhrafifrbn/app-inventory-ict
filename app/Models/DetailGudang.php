<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailGudang extends Model
{
    protected $table = "detail_gudang";


    protected $fillable = [
       "no_referensi",
       "kd_gudang",
       "kd_merek",
       "kd_barang",
       "user_nim_nip",
       "kode_inventaris",
       "kode_lab",
       "foto_barang",
       "status_keadaan",
       "kondisi_barang",
       "keterangan",
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

     // Terhubung ke table merek
    public function merek(){
        return $this->belongsTo(Merek::class, "kd_merek", "kd_merek");
    }
}
