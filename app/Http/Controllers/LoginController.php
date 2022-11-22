<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = Member::query()->firstWhere('email', $email);

        if ($user == null) {
            return $this->hasilRespons(404,false,'email tidak ditemukan');

        }if(!Hash::check($password, $user->password)){
            return $this->hasilRespons(404, false,'Password salah',);
        }
        $login = Login::create([
            'member_id' => $user->id,
            'auth_key' => $this->generateRandomString()
        ]);
        if(!$login){
            return $this->hasilRespons(401,false,'anuthorize');
        }
        $data = [
            'token' => $login->auth_key,
            'user' =>[
                'id' => $user->id,
                'email' => $user->email,
                
            ]
        ];
        return $this->hasilRespons(200, true, $data);
    }
    private function generateRandomString($length = 100) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
