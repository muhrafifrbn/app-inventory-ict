<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    
    protected $table = "barang";
    protected $primaryKey = 'kd_barang';
    public $incrementing = false; 
    protected $keyType = 'string'; 
}
