<?php

namespace App\Models;

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
}
