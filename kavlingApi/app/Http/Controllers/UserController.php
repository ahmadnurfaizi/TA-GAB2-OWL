<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

             // Function Index digunakan untuk menampilkan 1 data
             public function show($id)
             {
                 $data = Users::where("users.id_users",$id)->get();

                 if($data){
                     return ApiFormatter::createApi(200, 'Success', $data);
                 } else {
                     return ApiFormatter::createApi(400, 'Failed');
                 }
             }


    public function login(Request $request)
    {
        try {

            $data = Users::where('username', '=', $request->username)->where('password', '=', $request->password)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Login', $data);
            } else {
                return ApiFormatter::createApi(400, 'users/Password Wrong!');
            }
        } catch (Exception) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

}
