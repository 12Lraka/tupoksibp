@extends('tbylayout.app2')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active">
                <div class="table-responsive">
                    <table id ="#example1" class="table card-table table-hover table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>No. Penetapan/No. Putusan</th>
                            <th>Nomor Registrasi</th>
                            <th>Inisial Nama</th>
                            <th>Nama Petugas PK</th>
                            <th>Pembimbingan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($abimbingan->count() == 0)
                        <tr>
                            <td colspan="6">Tidak Ada Data</td>
                        </tr>
                        @else
                        @foreach($abimbingan as $abimb)
                        <tr>
                            <td>{{$abimb->putusan}}</td>
                            <td>{{$abimb->registrasi}}</td>
                            <td>{{$abimb->inisial_nama}}</td>
                            <td>{{$abimb->nama_petugas}}</td>
                            <td>Sedang Dalam Bimbingan</a></td>
                            <td>{{$abimb->keterangan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </table>   
                </div>
                <div class="table-pagination py-3">
                {{ $abimbingan->links() }}
                </div>
                </div>
            </div>     
        </div> 
    </div>   

    
@endsection

