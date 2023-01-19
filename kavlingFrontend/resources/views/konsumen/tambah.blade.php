@extends('home')
@section('content')

<section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Konsumen</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="create" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">nomer Kavling</label>
                                    <input type="text" name="no_kav" class="form-control" id="exampleInputEmail1"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" class="form-control" name="nama_konsumen" id="exampleInputItem Transaksi1"
                                        placeholder="nama ">
                                </div>                                
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">total pembelian</label>
                                    <input type="text" class="form-control" name="tot_pembelian" id="exampleInputtot_pembelian1"
                                        placeholder="total pembelian">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">pembayaran awal</label>
                                    <input type="text" class="form-control" name="pembayaran_awal" id="exampleInputpembayaran_awal1"
                                        placeholder="Pembayaran Awal">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection