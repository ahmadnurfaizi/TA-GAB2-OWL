<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class Buku_besarController extends Controller
{
    // Function Index digunakan untuk menampilkan data
    public function index(Request $request)
    {
        $json = file_get_contents("http://127.0.0.1:8000/api/buku_besar/" . $request->session()->get('id_buku_besar'));
        $data = json_decode($json, true);
        $buku_besar = $data['data'];
        return view('buku_besar.index', compact(['buku_besar']));
    }

    // Function create untuk tambah data
    public function create(Request $request)
    {
        return view('buku_besar/tambah_kredit');
    }

    // Function dcreate untuk tambah debit
    public function dcreate(Request $request)
    {
        return view('buku_besar/tambah_debit');
    }

    // Function update setelah adanya perubahan
    public function update(Request $request, $id)
    {
        if($request->debit != 0 )
        {
            $result = Http::post('http://127.0.0.1:8000/api/buku_besar/update/'.$id , [
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'debit' => $request->debit,
                'keterangan' => $request->keterangan,
            ]);
        }
        else
        {
            $result = Http::post('http://127.0.0.1:8000/api/buku_besar/update/'.$id ,[
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'kredit' => $request->kredit,
                'keterangan' => $request->keterangan,
            ]);
        }

        $data = json_decode($result, true);
        return redirect('/buku_besar');
    }

    // Function destroy digunakan untuk menghapus data
    public function destroy($id)
    {
        $result = Http::get("http://127.0.0.1:8000/api/buku_besar/destroy/" . $id);
        return redirect('/buku_besar');
    }

    // Function show untuk memanggil data
    public function show($id)
    {
        $result = Http::get("http://127.0.0.1:8000/api/buku_besar/show/" . $id);
        $data = json_decode($result, true);
        $buku_besar = $data['data'];
        return view('buku_besar.edit', compact(['buku_besar']));
    }

    // Function store untuk mengirimkan data
    public function store(Request $request)
    {
        if($request->debit != 0 )
        {
            $result = Http::post('http://127.0.0.1:8000/api/buku_besar/store',[
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'debit' => $request->debit,
                'keterangan' => $request->keterangan,
            ]);
        }
        else
        {
            $result = Http::post('http://127.0.0.1:8000/api/buku_besar/store',[
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'kredit' => $request->kredit,
                'keterangan' => $request->keterangan,
            ]);
        }

        $data = json_decode($result, true);
        return redirect('/buku_besar');
    }
}
