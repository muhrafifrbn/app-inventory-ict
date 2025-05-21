<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = "merk";
    protected $primaryKey = 'kd_merk';
    public $incrementing = false; 
    protected $keyType = 'string'; 
}
