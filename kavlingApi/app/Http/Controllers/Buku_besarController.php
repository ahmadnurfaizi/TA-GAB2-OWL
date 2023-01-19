<?php

namespace App\Http\Controllers;

use App\Models\Buku_besar;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;
use Illuminate\Support\Facades\Hash;

class Buku_besarController extends Controller
{
    public function login(Request $request)
    {
        try {

            $data = Buku_besar::where('username', '=', $request->username)->where('password', '=', $request->password)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Login', $data);
            } else {
                return ApiFormatter::createApi(400, 'buku_besar/Password Wrong!');
            }
        } catch (Exception) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

}
