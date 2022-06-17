@extends('template.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Pembimbingan & Pengawasan Dewasa</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">BpDewasa</li>
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
                        <a class="btn btn-primary" href="{{route('dbimbingan.create') }}">
                           <i class="fa fa-user-plus"></i> Tambah
                        </a>
                    </div>                                       
        
                    <div class="card-body">
                        <div class="table-responsive">  
                        <table id="example1" class="table table-bordered table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Klien</th>
                                <th>Nama Petugas</th>
                                <th>Pembimbingan</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($dbimbingan->count() == 0)
                                <tr>
                                    <td colspan="10">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($dbimbingan as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->nama_klien}}</td>
                                    <td>{{$temp->nama_petugas}}</td>
                                    <td><a class="btn btn-sm btn-primary" href="/dbimbingan/{{$temp->id}}/detail">{{$temp->bimbingan}}</a></td>
                                    <td>{{$temp->keterangan}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dbimbingan.destroy', $temp->id) }}" method="POST">
                                            <a href="{{ route('dbimbingan.edit', $temp->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a></a>
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
                        <div class="table-pagination">
                            <nav>
                                <ul class="pagination">           
                                    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                        <span class="page-link" aria-hidden="true">‹</span>
                                    </li>                                                                 
                                    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                    <li class="page-item"><a class="page-link" href="?page=2">2</a></li>                                                                       
                                    <li class="page-item"><a class="page-link" href="?page=2" rel="next" aria-label="Next »">›</a></li>
                                </ul>
                            </nav>
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
