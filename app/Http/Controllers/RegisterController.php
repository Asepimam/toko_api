<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = Hash::make($password = $request->input('password'));

        Register::create([
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        ]);
      return $this->hasilRespons(200,true,'success');
    }
}