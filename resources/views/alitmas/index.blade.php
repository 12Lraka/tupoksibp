@extends('template.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Penelitian Kemasyarakatan Anak</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">LITMAS Anak</li>
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
                        <a class="btn btn-primary" href="{{route('alitmas.create')}}">
                           <i class="fa fa-user-plus"></i> Tambah
                        </a>
                    </div>
        
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-sm table-bordered table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Asal Permintaan</th>
                                <th>Nama Inisial</th>
                                <th>Jenis Litmas</th>
                                <th>Nama Petugas</th>
                                <th>Proses</th>
                                <th>Selesai</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($alitmas->count() == 0)
                                <tr>
                                    <td colspan="11">Tidak Ada Data</td>
                                </tr>
                                @else
                                @foreach($alitmas as $temp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$temp->nomor_surat}}</td>
                                    <td>{{$temp->tgl_surat}}</td>
                                    <td>{{$temp->asal_permintaan}}</td>
                                    <td>{{$temp->inisal_nama}}</td>
                                    <td>{{$temp->jenis_litmas}}</td>
                                    <td>{{$temp->nama_petugas}}</td>
                                    <td><span class="badge badge-{{($temp->proses == 'Selesai') ? 'success':'default'}}">
                                    @if($temp->proses == 'Selesai') Selesai 
                                    @else($temp->proses == 'Sedang Dalam Proses') Sedang Dalam Proses
                                    @endif</span></td>
                                    <td>{{($temp->selesai == NULL) ? '-':$temp->selesai}}</td>                                    
                                    <td>{{$temp->keterangan}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('alitmas.destroy', $temp->id) }}" method="POST">
                                            <a href="{{ route('alitmas.edit', $temp->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a></a>
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