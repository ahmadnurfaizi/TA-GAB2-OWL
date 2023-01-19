@extends('home')
@section('content')

<section class="content">
  <div class="container-fluid ">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Konsumen</h3>

      </div>
      <a href="{{url('konsumen/tambah')}}" class="btn btn-primary">Tambah Data Konsumen</a>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr style="text-align:center ;">
              <th>No</th>
              <th>No kav</th>
              <th>Nama/ Total Pembelian</th>
              <th>Pembayaran Awal Kurang Bayar</th>
              <th>Kurang kurang_bayar</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 0  ?>
          @foreach ($konsumen as $data)
          @php $no++ @endphp
              <tr>
                <td><?php echo $no ?></td>
                <td>{{ $data['no_kav'] }}</td>
                <td>{{ $data['nama_konsumen'] }}</td>
                <td>{{ $data['tot_pembelian'] }}</td>
                <td>{{ $data['pembayaran_awal'] }}</td>
                <td>{{ $data['kurang_bayar'] }}</td>
                <td>
                  <a href="konsumen/hapus/{{ $data['id_konsumen'] }}" class="btn btn-default" >
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
@endsection