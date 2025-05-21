<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailNotaMasukPengadaan;

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
    public function DetailNotaMasukPengadaan(){
        return $this->hasMany(DetailNotaMasukPengadaan::class, "no_referensi", "no_referensi");
    }
}
