<?php

namespace App\Models;

use App\Models\DetailNotaBarangMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotaMasukPengadaan extends Model
{
    /** @use HasFactory<\Database\Factories\NotaMasukPengadaanFactory> */
    use HasFactory;

    protected $table = "nota_masuk_pengadaan";  
    protected $primaryKey = 'no_referensi';
    public $incrementing = false; 
    protected $keyType = 'string'; 

     protected $fillable = [
        "no_referensi",
        "hari",
        "tanggal",
        "jam",
        "dokumen_nota_barang_masuk",
        "user_nim_nip",
    ];

    // Terhubung ke Table User
    public function user(){
        return $this->belongsTo(User::class, "user_nim_nip", "nim_nip");
    }

     // Terhubung ke table Detail Nota Barang Masuk
    public function detailNotaBarangMasuk(){
        return $this->hasMany(DetailNotaBarangMasuk::class, "no_referensi", "no_referensi");
    }

    // Terhubung ke table Detail Gudang
    public function detailGudang(){
        return $this->hasMany(DetailGudang::class, "no_referensi", "no_referensi");
    }
}
