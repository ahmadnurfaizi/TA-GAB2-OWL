@extends('home')
@section('content')

<section class="content">

  <div class="container-fluid ">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Angsuran</h3>

      </div>
      <a href="{{url('angsuran/tambah')}}" style="margin-bottom: 10px" class="btn btn-primary">Tambah Data Angsuran</a>
      <a href="{{url('angsuran/pdf')}}" class="btn btn-primary">Cetak Laporan</a>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr style="text-align:center ;">
              <th>No</th>
              <th>nama konsumen</th>
              <th>Total Pembelian</th>
              <th>Pembayaran Awal </th>
              <th>kurang bayar</th>
              <th>tanggal angsuran</th>
              <th>nominal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0 ?>
            @foreach ($angsuran as $data)
            @php $no++ @endphp
              <tr>
                <td>@php
                    echo $no
                @endphp</td>
                <td>{{ $data['nama_konsumen'] }}</td>
                {{-- <td>Rp. {{ $data['modal'] }}</td> --}}
                <td>Rp. {{ $data['tot_pembelian'] }}</td>
                <td>Rp. {{ $data['pembayaran_awal'] }}</td>
                <td>Rp. {{ $data['kurang_bayar'] }}</td>
                <td> {{ $data['tanggal_angsuran'] }}</td>
                <td>Rp. {{ $data['nominal_angsuran'] }}</td>    
                <td>{{ $data['keterangan'] }}</td>   
              <td> 
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                  Hapus
                </button>
              </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>


@endsection