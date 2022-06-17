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
                            <th>Nama Klien</th>
                            <th>Nama Petugas</th>
                            <th>Pembimbingan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dbimbingan->count() == 0)
                        <tr>
                            <td colspan="5">Tidak Ada Data</td>
                        </tr>
                        @else
                        @foreach($dbimbingan as $dbimb)
                        <tr>
                            <td>{{$dbimb->nama_klien}}</td>
                            <td>{{$dbimb->nama_petugas}}</td>
                            <td>Sedang Dalam Bimbingan</td>                                    
                            <td>{{$dbimb->keterangan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </table>   
                </div>
                <div class="table-pagination py-3">
                {{ $dbimbingan->links() }}
                </div>
                </div>
            </div>     
        </div> 
    </div>   

    
@endsection

