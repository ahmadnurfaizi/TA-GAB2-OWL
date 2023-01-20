@extends('home')
@section('content')

<section class="content">

  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 style="padding-right: 30px" class="card-title">Data Buku Besar</h3>
        {{-- <a href="{{url('buku_besar/taba')}}" class="btn btn-primary">Tambah Data Modal</a>         --}}
        <a href="{{url('buku_besar/tambah_debit')}}" class="btn btn-primary">Tambah Data Debit</a>        
        <a href="{{url('buku_besar/tambah_kredit')}}" class="btn btn-primary">Tambah Data Kreadit</a>
      </div>
      
      <!-- /.card-header -->  
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Item</th>
              {{-- <th>Modal Utama</th> --}}
              <th>Debit/ Keluar</th>
              <th>Kreadit/ Masuk</th>
              <th>Saldo</th>
              <th>tanggal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0 ?>
          @foreach ($buku_besar as $data)
          @php $no++ @endphp
            <tr>
              <td>@php
                  echo $no
              @endphp</td>
              <td>{{ $data['item'] }}</td>
              {{-- <td>Rp. {{ $data['modal'] }}</td> --}}
              <td>Rp. {{ $data['debit'] }}</td>
              <td>Rp. {{ $data['kredit'] }}</td>
              <td>Rp. {{ $data['saldo'] }}</td>
              <td>Rp. {{ $data['tanggal'] }}</td>
              <td>Rp. {{ $data['keterangan'] }}</td>                          
              <td>
                <a href="buku_besar/hapus/{{ $data['id_buku_besar'] }}" class="btn btn-default" >
                  Hapus
                </a>
               
              </td>
            </tr>
            @endforeach            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin Ingin Menghapus??&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">batal</button>
       
        {{-- <a href="buku_besar/hapus/{{ $data['id_buku_besar'] }}" class="btn btn-primary">hapus</a> --}}
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection