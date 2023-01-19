<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\Konsumen;
use Exception;
use Illuminate\Support\Facades\Hash;

class AngsuranController extends Controller
{
    public function login(Request $request)
    {
        try {

            $data = Angsuran::where('username', '=', $request->username)->where('password', '=', $request->password)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Login', $data);
            } else {
                return ApiFormatter::createApi(400, 'angsuran/Password Wrong!');
            }
        } catch (Exception) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

}
