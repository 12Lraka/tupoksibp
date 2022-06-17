@extends('template.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><small>Detail Pembimbingan Anak</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Detail Anak</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Detail Klien -->
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Klien Dewasa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             
                <strong><i class="fas fa-id-card mr-1"></i> Nomor Registrasi</strong>
                <p class="text-muted">
                {{$abimbingan->registrasi}}
                </p>
                <hr>

                <strong><i class="far fa-id-badge mr-1"></i> Nomor Putusan</strong>
                <p class="text-muted">{{$abimbingan->putusan}}</p>     
                <hr>

                <strong><i class="far fa-id-badge mr-1"></i> Nama Petugas</strong>
                <p class="text-muted">{{$abimbingan->nama_petugas}}</p>     
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Total Pembimbingan</strong>
                <p class="text-muted">
                {{$abimbingan->rincian->count()}}
                </p>
                <hr>
              </div>
            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-outline card-info">
              <div class="card-header p-2">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create">
                    Tambah
                  </button>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                      <th>Tanggal</th>
                      <th>Jenis Bimbingan</th>
                      <th>Uraian</th>
                      <th>Catatan</th>  
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($abimbingan->rincian as $rincian)
                      <tr>
                        <td>{{$rincian->pivot->tgl}}</td>
                        <td>{{$rincian->jenis_bimbingan}}</td>
                        <td>{{$rincian->pivot->uraian}}</td>
                        <td>{{$rincian->pivot->catatan}}</td> 
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>     
              </div><!-- /.card-body -->
            </div>
            
          </div>
         
        </div>
        
      </div><!-- /.container-fluid -->
    </section>

<div class="modal fade create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/abimbingan/{{$abimbingan->id}}/adddetail" enctype="multipart/form-data">
              @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Detail Pembimbingan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                  
                    <div class="form-group {{ $errors->has('tgl') ? 'has-error' :'' }}">
                        <label class="control-label">Tanggal*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input name="tgl" value="{{old('tgl')}}" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                            </div>
                        </div>                                                  
                        <div class="form-group">
                            <label for="rincian">Jenis Bimbingan*</label>
                            <select class="form-control" id='rincian' name='rincian'>                            
                                @foreach($jenisdetail as $jd)
                                <option value="{{$jd->id}}">{{$jd->jenis_bimbingan}}</option>
                                @endforeach                                                           
                            </select>
                        </div>                       
                        <div class="form-group {{ $errors->has('uraian') ? 'has-error' :'' }}">
                            <label class="control-label">Uraian*</label>
                            <input name="uraian" value="{{old('uraian')}}" type="text" class="form-control" placeholder=" Isikan Uraian" maxlength="100" required>
                            <span class="help-block">{{$errors->first('uraian')}}</span>
                        </div>                       
                        <div class="form-group {{ $errors->has('catatan') ? 'has-error' :'' }}">
                            <label class="control-label">Catatan*</label>
                            <input name="catatan" value="{{old('catatan')}}" type="text" class="form-control" placeholder=" Isikan Catatan" maxlength="100" required>
                            <span class="help-block">{{$errors->first('catatan')}}</span>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
        </div>
    </div>
</div>
@endsection