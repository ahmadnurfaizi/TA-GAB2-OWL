<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Function Index digunakan untuk menampilkan banyak Data
    public function index()
    {
        $data = Users::orderBy("users.created_at", "DESC")->get();
        if($data)
        {
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // Function store digunakan untuk mengirim data ke tabel database
    public function store(Request $request)
    {
        try
        {
            $insert = Users::create($request->all());
            $data = Users::where("id_users","=", $insert->id_users)->get();
            if($data)
            {
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            else
            {
                return ApiFormatter::createApi(400, 'Failed');
            }
        }
        catch(Exception)
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // Function show digunakan untuk menampilkan 1 data
    public function show($id)
    {
        $data = Users::where("users.id_users",$id)->get();
        if($data)
        {
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // Function update digunakan untuk mengirim data yang sudah di edit ke tabel database
    public function update(Request $request, $id)
    {
        try
        {
            $data = $request->all();
            $update = Users::findOrFail($id)->update($data);
            $data = Users::where("id_users",$id);
            if($data)
            {
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            else
            {
                return ApiFormatter::createApi(400, 'Failed');
            }
        }
        catch(Exception)
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // Function login digunakan untuk konfirmasi hak akses
    public function login(Request $request)
    {
        try
        {
            $data = Users::where('username', '=', $request->username)->where('password', '=', $request->password)->get();
            if ($data)
            {
                return ApiFormatter::createApi(200, 'Success Login', $data);
            }
            else
            {
                return ApiFormatter::createApi(400, 'users/Password Wrong!');
            }
        }
        catch (Exception)
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

}
