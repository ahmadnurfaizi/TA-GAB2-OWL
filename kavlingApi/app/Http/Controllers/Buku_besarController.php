<?php

namespace App\Http\Controllers;

use App\Models\Buku_besar;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;
use Illuminate\Support\Facades\Hash;

class Buku_besarController extends Controller
{
    // Function Index digunakan untuk menampilkan banyak Data
    public function index()
    {
        $data = Buku_besar::orderBy("buku_besar.created_at", "DESC")->get();
        if($data)
        {
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // Function Index digunakan untuk mengirim data ke tabel database
    public function store(Request $request)
    {
        try
        {
            $data = $request->all();
            $cek_saldo = Buku_besar::orderBy("created_at", "DESC")->first();
            // ini ngecek apakah form debit tidak 0
            if(($request->debit != 0))
            {
                // DEBIT = UANG KELUAR
                //ini ngecek saldo jika saldo kosong
                if(empty($cek_saldo['saldo']))
                {
                    // yang ini klksaldonya kosong trs langsung ada debit berarti kan mines (-)
                    $data['saldo'] = "-".$request->debit;
                }
                else
                {
                    // bagian ini untuk menghitung saldo terakhir di kurangin debit
                    $data['saldo'] = $cek_saldo['saldo'] - $request->debit;
                }
            }
            else
            {
                // KREDIT = UANG MASUK
                if(empty($cek_saldo['saldo']))
                {
                    $data['saldo'] = $request->kredit;
                }
                else
                {
                    $data['saldo'] = $request->kredit + $cek_saldo['saldo'];
                }
            }
            $insert = Buku_besar::create($data);

            $data = Buku_besar::where("id_buku_besar","=", $insert->id_buku_besar)->first();
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
        $data = Buku_besar::where("buku_besar.id_buku_besar",$id)->get();
        if($data)
        {
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // Function login digunakan untuk konfirmasi hak akses
    public function login(Request $request)
    {
        try
        {
            $data = Buku_besar::where('username', '=', $request->username)->where('password', '=', $request->password)->get();
            if ($data)
            {
                return ApiFormatter::createApi(200, 'Success Login', $data);
            }
            else
            {
                return ApiFormatter::createApi(400, 'buku_besar/Password Wrong!');
            }
        }
        catch (Exception)
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

}
