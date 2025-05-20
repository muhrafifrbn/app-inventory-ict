<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index(){
        return view("registrasi");
    }

    public function store(Request $request){
        $resultValidate = $request->validate([
            "nim_nip" => ["required", "min:5", "unique:users", "max:10"],
            "nama" => ["required"],
            "alamat" => ["required"],
            "no_hp" => ["required", "numeric"],
            "jabatan_lab" => ["required"],
            "password" => ["required", "confirmed"],
            "angkatan_asisten" => ["required"]
        ]);

        $resultValidate["password"] = Hash::make($resultValidate["password"]);

        User::create($resultValidate);

        return \redirect("/login")->with("sukses", "Registrasi Berhasil, Silahkan Login");
    }
}
