@extends('template.app')
@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Edit Data Pembimbingan & Pengawasan Dewasa</small.</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">BpDewasa </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="card card-outline card-info">
                <form action="{{route('dbimbingan.update', $parse->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-header with-border">
                        <h3 class="card-title">Data Klien : {{$parse->nama_klien}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('nama_klien') ? 'has-error' :'' }}">
                            <label class="control-label">Nama Klien *</label>
                            <input name="nama_klien" value="{{$parse->nama_klien}}" type="text" class="form-control" placeholder="Masukkan Nama Klien" maxlength="100" required>
                            <span class="help-block">{{$errors->first('nama_klien')}}</span>
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
                        <div class="form-group {{ $errors->has('bimbingan') ? 'has-error' :'' }}">
                            <label class="control-label">Pembimbingan*</label>
                            <input name="bimbingan" value="{{$parse->bimbingan}}" type="text" class="form-control" placeholder="Isikan Detail" maxlength="10" required>
                            <span class="help-block">{{$errors->first('bimbingan')}}</span>
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
                            <a href="{{route('dbimbingan.index')}}" class="btn btn-secondary">Batal</a>
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