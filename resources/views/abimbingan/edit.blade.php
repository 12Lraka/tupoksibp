@extends('template.app')
@section('content')
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Edit Data Pembimbingan & Pengawasan Anak</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Bpanak</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <div class="card card-outline card-info">
                <form action="{{route('abimbingan.update', $parse->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header with-border">
                        <h3 class="card-title">Data Klien Anak: {{$parse->registrasi}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('putusan') ? 'has-error' :'' }}">
                            <label class="control-label">No. Penetapan/No. Putusan *</label>
                            <input name="putusan" value="{{$parse->putusan}}" type="text" class="form-control" placeholder="Masukkan Nomor Penetapan/Nomor Putusan" maxlength="191" required>
                            <span class="help-block">{{$errors->first('putusan')}}</span>
                        </div>  
                        <div class="form-group {{ $errors->has('registrasi') ? 'has-error' :'' }}">
                            <label class="control-label">Nomor Registrasi *</label>
                            <input name="registrasi" value="{{$parse->registrasi}}" type="text" class="form-control" placeholder="Masukkan Nomor Registrasi" maxlength="191" required>
                            <span class="help-block">{{$errors->first('registrasi')}}</span>
                        </div>  
                        <div class="form-group {{ $errors->has('inisial_nama') ? 'has-error' :'' }}">
                            <label class="control-label">Inisial Nama *</label>
                            <input name="inisial_nama" value="{{$parse->inisial_nama}}" type="text" class="form-control" placeholder="Masukkan Inisial Nama" maxlength="191" required>
                            <span class="help-block">{{$errors->first('inisial_nama')}}</span>
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
                            <a href="{{route('abimbingan.index')}}" class="btn btn-secondary">Batal</a>
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