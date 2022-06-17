@extends('template.app')
@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Edit Data Penelitian Kemasyarakatan</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">LITMAS Dewasa</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="card card-outline card-info">
                <form action="{{route('dlitmas.update', $parse->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-header with-border">
                        <h3 class="card-title">Data Klien : {{$parse->nama_klien}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('asal_permintaan') ? 'has-error' :'' }}">
                            <label class="control-label">Asal Permintaan *</label>
                            <input name="asal_permintaan" value="{{$parse->asal_permintaan}}" type="text" class="form-control" placeholder="Masukkan Asal Permintaan" maxlength="10" required>
                            <span class="help-block">{{$errors->first('asal_permintaan')}}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tgl_surat') ? 'has-error' :'' }}">
                        <label class="control-label">Tanggal Surat*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input name="tgl_surat" value="{{$parse->tgl_surat}}" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                            </div>
                        </div> 
                        <div class="form-group {{ $errors->has('nama_klien') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Klien *</label>
                            <input name="nama_klien" value="{{$parse->nama_klien}}" type="text" class="form-control" placeholder="Masukkan Nama Klien" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nama_klien')}}</span>
                        </div>                                                        
                        <div class="form-group {{ $errors->has('jenis_litmas') ? 'has-error' :'' }}">
                            <label class="control-label">Jenis Kelamin *</label>
                            <select name="jenis_litmas" class="form-control" required>
                                <option value="" {{$parse->jenis_litmas == '' ? 'selected':''}}>-- Pilih --</option>
                                <option value="CB" {{$parse->jenis_litmas == 'CB' ? 'selected':''}}>CB</option>
                                <option value="PB" {{$parse->jenis_litmas == 'PB' ? 'selected':''}}>PB</option>
                                <option value="CMB" {{$parse->jenis_litmas == 'CMB' ? 'selected':''}}>CMB</option>                                
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
                                <option value="Sedang Berlangsung" {{$parse->proses == 'Sedang Berlangsung' ? 'selected':''}}>Sedang Berlangsung</option>
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
                            <a href="{{route('dlitmas.index')}}" class="btn btn-secondary">Batal</a>
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