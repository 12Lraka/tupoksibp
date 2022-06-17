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
                            <th>Nomor Surat</th>
                            <th>Asal Surat</th>
                            <th>Nama Inisial</th>
                            <th>Nama Petugas</th>
                            <th>Proses</th>
                            <th>Selesai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                     @if($pendampingan->count() == 0)
                        <tr>
                            <td colspan="7">Tidak Ada Data</td>
                        </tr>
                        @else
                        @foreach($pendampingan as $pda)
                        <tr>                            
                            <td>{{$pda->nomor_surat}}</td>
                            <td>{{$pda->asal_surat}}</td>
                            <td>{{$pda->inisial_nama}}</td>
                            <td>{{$pda->nama_petugas}}</td>
                            <td><span class="badge badge-{{($pda->proses == 'Selesai') ? 'success':'default'}}">
                                    @if($pda->proses == 'Selesai') Selesai 
                                    @else($pda->proses == 'Sedang Dalam Proses') Sedang Dalam Proses
                                    @endif</span></td>
                            <td>{{$pda->selesai}}</td>
                            <td>{{$pda->keterangan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </table>   
                </div>
                <div class="table-pagination py-3">
                {{ $pendampingan->links() }}
                </div>
                </div>
            </div>     
        </div> 
    </div>   

    
@endsection

