@extends('template.app')
@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Edit Data Penelitian Kemasyarakatan Anak</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">LITMAS Anak </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="card card-outline card-info">
                <form action="{{route('alitmas.update', $parse->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-header with-border">
                        <h3 class="card-title">Data Klien : {{$parse->inisial_nama}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('nomor_surat') ? 'has-error' :'' }}">
                            <label class="control-label">Nomor Surat *</label>
                            <input name="nomor_surat" value="{{$parse->nomor_surat}}" type="text" class="form-control" placeholder="Masukkan Nomor Surat" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nomor_surat')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tgl_surat') ? 'has-error' :'' }}">
                            <label class="control-label">Tanggal Surat*</label>
                            <input name="tgl_surat" id="datepicker" value="{{$parse->tgl_surat}}" type="text" class="form-control" placeholder="Masukkan Tanggal Surat" maxlength="10" required>                            
                            <span class="help-block">{{$errors->first('tgl_surat')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('asal_permintaan') ? 'has-error' :'' }}">
                            <label class="control-label">Asal Permintaan *</label>
                            <input name="asal_permintaan" value="{{$parse->asal_permintaan}}" type="text" class="form-control" placeholder="Masukkan Asal Permintaan" maxlength="100" required>
                            <span class="help-block">{{$errors->first('asal_permintaan')}}</span>
                        </div>  
                        <div class="form-group {{ $errors->has('inisal_nama') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Inisial *</label>
                            <input name="inisal_nama" value="{{$parse->inisal_nama}}" type="text" class="form-control" placeholder="Masukkan Nama Inisial" maxlength="100" required>
                            <span class="help-block">{{$errors->first('inisal_nama')}}</span>
                        </div>                                                        
                        <div class="form-group {{ $errors->has('jenis_litmas') ? 'has-error' :'' }}">
                            <label class="control-label">Jenis Litmas *</label>
                            <select name="jenis_litmas" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Sidang PN" {{$parse->jenis_litmas}}>Sidang PN</option>
                                <option value="Diversi"  {{$parse->jenis_litmas}}>Diversi</option>
                                <option value="Sidang PN/Diversi" {{$parse->jenis_litmas}}>Sidang PN/Diversi</option>                                
                            </select>
                            <span class="help-block">{{$errors->first('jenis_litmas')}}</span>
                        </div> 
                        <div class="form-group {{ $errors->has('nama_petugas') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Petugas *</label>
                            <select name="nama_petugas" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach($tugas as $temp)
                                <option value="{{$temp->nama}}" {{($parse->nama_petugas == $temp->nama) ? 'selected':''}}>{{$temp->nama}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first('nama_petugas')}}</span>
                        </div>                                                   
                        <div class="form-group {{ $errors->has('proses') ? 'has-error' :'' }}">
                            <label class="control-label">Proses*</label>
                            <select id="IDproses" name="proses" class="form-control" required>
                                <option value="" {{$parse->proses == '' ? 'selected':''}}>-- Pilih --</option>
                                <option value="Sedang Dalam Proses" {{$parse->proses == 'Sedang Dalam Proses' ? 'selected':''}}>Sedang Dalam Proses</option>
                                <option value="Selesai" {{$parse->proses == 'Selesai' ? 'selected':''}}>Selesai</option>                             
                            </select>
                            <span class="help-block">{{$errors->first('proses')}}</span>
                        </div> 
                        <div class="form-group" id="IDselesai">
                        <label class="control-label">Selesai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input name="selesai" value="{{$parse->selesai}}" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                            </div>
                        </div> 
                        <div class="form-group {{ $errors->has('keterangan') ? 'has-error' :'' }}">
                            <label class="control-label">Keterangan*</label>
                            <input name="keterangan" value="{{$parse->keterangan}}" type="text" class="form-control" placeholder="Keterangan" maxlength="100" required>                            
                            <span class="help-block">{{$errors->first('keterangan')}}</span>
                        </div>
                        <div class="card-footer with-border">
                            <div class="button-wrapper float-right">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="_method" value="PATCH" />
                            <input type="hidden" name="id" value="{{$parse->id}}" />
                            <a href="{{route('alitmas.index')}}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop