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
                            <th>Tanggal Surat</th>
                            <th>Asal Permintaan</th>
                            <th>Nama Inisial</th>
                            <th>Jenis Litmas</th>
                            <th>Nama Petugas</th>
                            <th>Proses</th>
                            <th>Selesai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($alitmas->count() == 0)
                        <tr>
                            <td colspan="9">Tidak Ada Data</td>
                        </tr>
                        @else
                        @foreach($alitmas as $alit)
                        <tr>
                            <td>{{$alit->nomor_surat}}</td>
                            <td>{{$alit->tgl_surat}}</td>
                            <td>{{$alit->asal_permintaan}}</td>
                            <td>{{$alit->inisal_nama}}</td>
                            <td>{{$alit->jenis_litmas}}</td>
                            <td>{{$alit->nama_petugas}}</td>
                            <td><span class="badge badge-{{($alit->proses == 'Selesai') ? 'success':'default'}}">
                                    @if($alit->proses == 'Selesai') Selesai 
                                    @else($alit>proses == 'Sedang Dalam Proses') Sedang Dalam Proses
                                    @endif</span></td>
                            <td>{{$alit->selesai}}</td>                                    
                            <td>{{$alit->keterangan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </table>   
                </div>
                <div class="table-pagination py-3">
                {{ $alitmas->links() }}
                </div>
                </div>
            </div>     
        </div> 
    </div>   

    
@endsection

