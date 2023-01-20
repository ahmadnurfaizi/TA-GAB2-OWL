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
                            <h3 class="card-title">Tambah debit Buku Besar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="tambah" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Treansaksi</label>
                                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Item Transaksi</label>
                                    <input type="text" class="form-control" name="item" id="exampleInputItem Transaksi1"
                                        placeholder="Item Transaksi">
                                </div>                                
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nominal</label>
                                    <input type="text" class="form-control" name="debit" id="exampleInputNominal1"
                                        placeholder="Nominal">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan ..."></textarea>
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