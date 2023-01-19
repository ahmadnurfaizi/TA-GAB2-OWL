<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class KonsumenController extends Controller
{
    // Function Index digunakan untuk menampilkan data
    public function index(Request $request)
    {
        $json = file_get_contents("http://127.0.0.1:8000/api/konsumen/" . $request->session()->get('id_konsumen'));
        $data = json_decode($json, true);
        $konsumen = $data['data'];
        return view('konsumen.index', compact(['konsumen']));
    }

    // Function create untuk tambah data
    public function create(Request $request)
    {
        return view('konsumen/tambah');
    }

    // Function dcreate untuk tambah debit
    public function dcreate(Request $request)
    {
        return view('konsumen/tambah_debit');
    }

    // Function update setelah adanya perubahan
    public function update(Request $request, $id)
    {
        if($request->debit != 0 ){
            $result = Http::post('http://127.0.0.1:8000/api/konsumen/update/'.$id , [
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'debit' => $request->debit,
                'keterangan' => $request->keterangan,
            ]);
        }
        else
        {
            $result = Http::post('http://127.0.0.1:8000/api/konsumen/update/'.$id ,[
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'kredit' => $request->kredit,
                'keterangan' => $request->keterangan,
            ]);
        }

        $data = json_decode($result, true);
        return redirect('/konsumen');
    }

    // Function destroy digunakan untuk menghapus data
    public function destroy($id)
    {
        $result = Http::get("http://127.0.0.1:8000/api/konsumen/destroy/" . $id);
        return redirect('/konsumen');
    }

    // Function show untuk memanggil data
    public function show($id)
    {
        $result = Http::get("http://127.0.0.1:8000/api/konsumen/show/" . $id);
        $data = json_decode($result, true);
        $konsumen = $data['data'];
        return view('konsumen.edit', compact(['konsumen']));
    }

    // Function store untuk mengirimkan data
    public function store(Request $request)
    {
        $result = Http::post('http://127.0.0.1:8000/api/konsumen/store/',[
            'nama_konsumen' => $request->nama_konsumen,
            'no_kav' => $request->no_kav,
            'tot_pembelian' => $request->tot_pembelian,
            'pembayaran_awal' => $request->pembayaran_awal,
        ]);

        $data = json_decode($result, true);
        return redirect('/konsumen');
    }
}
