<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }

    public function authenticate(Request $request){
        $resultValidate = $request->validate([
            "nim_nip" => ["required"],
            "password" => ["required"]
        ]);


        if(Auth::attempt($resultValidate)){
            $request->session()->regenerate();
            return \redirect()->intended("/dashboard");
        }

          return \redirect("/login")->with("loginError", "Login Gagal!");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return \redirect("/login");
    }
}
