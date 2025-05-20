<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaMasukPengadaan;

class GudangController extends Controller
{
  
    public function index(){
        return view("dashboard.gudang.index");
    }
}
