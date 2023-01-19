<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Function login
    public function login()
    {
        return view('login');
    }

    // Function auth
    public function auth(Request $request)
    {
        $result = Http::post('http://127.0.0.1:8000/api/users/login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);
        $data = json_decode($result, true);

        $data['data'];
        if (!empty($data['data']))
        {
            return redirect('/home');
        }
        else
        {
            return redirect('/');
        }
    }

    // Function logout
    public function logout(Request $request)
    {
        return redirect('/');
    }
}
