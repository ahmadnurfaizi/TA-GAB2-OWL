<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use PDF;

class AngsuranController extends Controller
{
    // Function Index digunakan untuk menampilkan data
    public function index(Request $request)
    {
        $json = file_get_contents("http://127.0.0.1:8000/api/angsuran/" . $request->session()->get('id_angsuran'));
        $data = json_decode($json, true);
        $angsuran = $data['data'];
        return view('angsuran.index', compact(['angsuran']));
    }

    // Function generatePDF digunakan untuk pencetakan
    public function generatePDF(Request $request)
    {
        $json = file_get_contents("http://127.0.0.1:8000/api/laporan");
        $data = json_decode($json, true);
        $angsuran = $data['data'];
        $pdf = PDF::loadView('angsuran.pdf', compact('angsuran'))->setPaper('F4', 'potrait');
        return $pdf->stream();
    }

    // Function create untuk tambah data
    public function create(Request $request)
    {
        $json = file_get_contents("http://127.0.0.1:8000/api/konsumen/" . $request->session()->get('id_konsumen'));
        $data = json_decode($json, true);
        $konsumen = $data['data'];
        return view('angsuran.tambah', compact(['konsumen']));
    }

    // Function dcreate untuk tambah debit
    public function dcreate(Request $request)
    {
        return view('angsuran/tambah_debit');
    }

    // Function update setelah adanya perubahan
    public function update(Request $request, $id)
    {
        if($request->debit != 0 ){
            $result = Http::post('http://127.0.0.1:8000/api/angsuran/update/'.$id , [
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'debit' => $request->debit,
                'keterangan' => $request->keterangan,
            ]);
        }
        else
        {
            $result = Http::post('http://127.0.0.1:8000/api/angsuran/update/'.$id ,[
                'tanggal' => $request->tanggal,
                'item' => $request->item,
                'kredit' => $request->kredit,
                'keterangan' => $request->keterangan,
            ]);
        }

        $data = json_decode($result, true);
        return redirect('/angsuran');
    }

    // Function destroy digunakan untuk menghapus data
    public function destroy($id)
    {
        $result = Http::get("http://127.0.0.1:8000/api/angsuran/destroy/" . $id);
        return redirect('/angsuran');
    }

    // Function show untuk memanggil data
    public function show($id)
    {
        $result = Http::get("http://127.0.0.1:8000/api/angsuran/show/" . $id);
        $data = json_decode($result, true);
        $angsuran = $data['data'];
        return view('angsuran.edit', compact(['angsuran']));
    }

    // Function store untuk mengirimkan data
    public function store(Request $request)
    {
        $result = Http::post('http://127.0.0.1:8000/api/angsuran/store/',[
            'tanggal_angsuran' => $request->tanggal_angsuran,
            'id_konsumen' => $request->id_konsumen,
            'nominal_angsuran' => $request->nominal_angsuran,
            'keterangan' => $request->keterangan,
        ]);

        $data = json_decode($result, true);
        return redirect('/angsuran');
    }
}
