<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = "ruang";
    protected $primaryKey = 'kd_ruang';
    public $incrementing = false; 
    protected $keyType = 'string'; 


    protected $fillable = [
        "kd_ruang",
        "nama_ruang"
     ];
}
