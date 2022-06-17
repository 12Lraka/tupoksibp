@extends('template.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Nama Petugas PK</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Petugas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create">
                            Tambah
                        </button>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->count() == 0)
                                <tr>
                                    <td colspan="3">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($data as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->nama}}</td>
                                    <td>
                                        <div class="btn-group">
                                                <a href="#" data-value="{{$temp->nama}}" data-id="{{$temp->id}}" class="btn-sm btn-info" data-toggle="modal" data-target=".edit-job"><i class="fa fa-edit"></i></a>
                                                <a href="#" data-messages="{{$temp->nama}}" data-href="{{route('petugas.destroy', $temp->id)}}" class="btn-sm btn-danger" data-toggle="modal" data-target=".confirm-delete"><i class="fa fa-trash"></i></a>
                                        </div>       
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#dd4b39;color:#FFFFFF">
                <h4 class="modal-title">Peringatan !</h4>
            </div>
            <div class="modal-body messages">
                <!-- NTONG DIEUSIAN -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{route('petugas.store')}}" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input1">Nama Petugas *</label>
                        <input name="nama" class="form-control" id="input1" placeholder="Masukkan Nama Petugas PK" type="text" maxlength="100" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
        </div>
    </div>
</div>

<div class="modal fade edit-job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{route('petugas.update')}}" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="input1">Nama Petugas *</label>
                            <input name="nama" class="form-control value-job" id="input1" placeholder="Masukkan Nama Petugas" type="text" maxlength="100" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="id" class="value-id" />
                        <input type="hidden" name="_method" value="patch" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
@endsection