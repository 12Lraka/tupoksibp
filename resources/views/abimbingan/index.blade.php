@extends('template.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Pembimbingan & Pengawasan Anak</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">B&P Anak</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-xs-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{route('abimbingan.create')}}">
                           <i class="fa fa-user-plus"></i> Tambah
                        </a>
                    </div>
        
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>No. Penetapan/No. Putusan</th>
                                <th>Nomor Registrasi</th>
                                <th>Inisial Nama</th>
                                <th>Nama Petugas PK</th>
                                <th>Pembimbingan</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($abimbingan->count() == 0)
                                <tr>
                                    <td colspan="8">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($abimbingan as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->putusan}}</td>
                                    <td>{{$temp->registrasi}}</td>
                                    <td>{{$temp->inisial_nama}}</td>
                                    <td>{{$temp->nama_petugas}}</td>
                                    <td><a class="btn btn-sm btn-primary" href="/abimbingan/{{$temp->id}}/detail">{{$temp->bimbingan}}</a></td>
                                    <td>{{$temp->keterangan}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('abimbingan.destroy', $temp->id) }}" method="POST">
                                            <a href="{{ route('abimbingan.edit', $temp->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></i></button>
                                        </form> 
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
@endsection