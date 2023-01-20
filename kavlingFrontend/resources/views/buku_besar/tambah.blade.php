@extends('home');
@section('content')

<section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Buku Besar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Treansaksi</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Item Transaksi</label>
                                    <input type="text" class="form-control" id="exampleInputItem Transaksi1"
                                        placeholder="Item Transaksi">
                                </div>
                                <div class="form-group">
                                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                                      <option>Masuk nya Dana</option>
                                      <option>Debit</option>
                                      <option>Modal Utama</option>
                                      <option>Kreadit </option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nominal</label>
                                    <input type="text" class="form-control" id="exampleInputNominal1"
                                        placeholder="Nominal">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" rows="3" placeholder="Keterangan ..."></textarea>
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