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
                            <h3 class="card-title">Edit Buku Besar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @foreach ($buku_besar as $data)
                        @endforeach
                        <form method="post" action="/buku_besar/update/{{ $data['id_buku_besar'] }}" autocomplete="off">
                            @csrf
                           
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Treansaksi</label>
                                    <input type="date" name="tanggal" value="{{ $data['tanggal'] }}" class="form-control"  id="exampleInputEmail1"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Item Transaksi</label>
                                    <input type="text" class="form-control" name="item" value="{{ $data['item'] }}"  id="exampleInputItem Transaksi1"
                                        >
                                </div>                                
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Debit</label>
                                    <input type="number" class="form-control" name="debit" value="{{ $data['debit'] }}" id="exampleInputNominal1"
                                        >
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Kredit</label>
                                    <input type="number" class="form-control" name="kredit" value="{{ $data['kredit'] }}" id="exampleInputNominal1"
                                        >
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input class="form-control" name="keterangan" value="{{ $data['keterangan'] }}" rows="3" ></input>
                                  </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">edit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection