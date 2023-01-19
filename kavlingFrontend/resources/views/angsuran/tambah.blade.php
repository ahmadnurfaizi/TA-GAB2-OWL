@extends('home')
@section('content')

<section class="content">

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Angsuran</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="store">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Treansaksi</label>
                                    <input type="date" name="tanggal_angsuran" class="form-control" id="exampleInputEmail1"
                                       >
                                </div>
                                <div class="form-group">
                                    <select name="id_konsumen" class="custom-select form-control-border" id="exampleSelectBorder">
                                      <option>Konsumen </option>
                                      @foreach ($konsumen as $data)
                                      <option  value="{{$data['id_konsumen']}}">{{$data['nama_konsumen']}} </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nominal Angsuran</label>
                                    <input type="text" class="form-control" name="nominal_angsuran" id="exampleInputNominal1"
                                        placeholder="Nominal">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan ..."></textarea>
                                  </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection