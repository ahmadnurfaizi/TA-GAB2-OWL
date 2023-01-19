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
    // Function Index digunakan untuk menampilkan banyak Data
    public function index()
    {
        $data = Angsuran::join("konsumen","konsumen.id_konsumen","angsuran.id_konsumen")->get();
        if($data)
        {
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // Function laporan digunakan untuk membuat laporan
    public function laporan()
    {
        $konsumen = Konsumen::orderBy("nama_konsumen", "DESC")->get();
        foreach($konsumen as $row)
        {
            $angsuran = Angsuran::where("id_konsumen", $row['id_konsumen'])->orderBy("tanggal_angsuran", "ASC")->get();
            foreach ($angsuran as $as)
            {
                $bulan = date('M', strtotime($as['tanggal_angsuran']));
                $tgl_bayar = "tgl".$bulan;
                $nominal = "nominal".$bulan;
                $data_angsuran[] = array(
                    $bulan => $bulan,
                    $tgl_bayar => $as['tanggal_angsuran'],
                    $nominal => $as['nominal_angsuran'],
                );
                $data[] = array(
                    'id_konsumen' => $row['id_konsumen'],
                    'nama_konsumen' => $row['nama_konsumen'],
                    'no_kav' => $row['no_kav'],
                    'tot_pembelian' => $row['tot_pembelian'],
                    'pembayaran_awal' => $row['pembayaran_awal'],
                    'kurang_bayar' => $row['kurang_bayar'],
                    'created_at' => $row['created_at'],
                    'tanggal_angsuran' => $as['tanggal_angsuran'],
                    'nominal_angsuran' => $as['nominal_angsuran']
                );
            }
        }
        if($data )
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
            $data = $request->all();
            $insert = Angsuran::create($data);
            $data = Angsuran::where("id_angsuran","=", $insert->id_angsuran)->first();
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
        $data = Angsuran::where("angsuran.id_angsuran",$id)->get();
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
            if(($request->kurang_bayar == 0))
            {
                $data['kurang_bayar'] = $request->tot_pembelian - $request->pembayaran_awal;
            }
            else
            {
                $data['kurang_bayar'] = $request->tot_pembelian - $request->pembayaran_awal;
            }
            $update = Angsuran::findOrFail($id)->update($data);

            $data = Angsuran::where("id_angsuran",$id);
            if($update)
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
            $data = Angsuran::where('username', '=', $request->username)->where('password', '=', $request->password)->get();
            if ($data)
            {
                return ApiFormatter::createApi(200, 'Success Login', $data);
            }
            else
            {
                return ApiFormatter::createApi(400, 'angsuran/Password Wrong!');
            }
        }
        catch (Exception)
        {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

}
