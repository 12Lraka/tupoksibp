@extends('tbylayout.app2')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="w-100 py-2">
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active">
                <div class="table-responsive">
                    <table id ="#example1" class="table card-table table-hover table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Asal Permintaan</th>
                            <th>Tanggal Surat</th>
                            <th>Nama Klien</th>
                            <th>Jenis Litmas</th>
                            <th>Nama Petugas</th>
                            <th>Proses</th>
                            <th>Selesai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dlitmas->count() == 0)
                        <tr>
                            <td colspan="9">Tidak Ada Data</td>
                        </tr>
                        @else
                        @foreach($dlitmas as $temp)
                        <tr>
                            <td>{{$temp->asal_permintaan}}</td>
                            <td>{{$temp->tgl_surat}}</td>
                            <td>{{$temp->nama_klien}}</td>
                            <td>{{$temp->jenis_litmas}}</td>
                            <td>{{$temp->nama_petugas}}</td>
                            <td><span class="badge badge-{{($temp->proses == 'Selesai') ? 'success':'default'}}">
                                    @if($temp->proses == 'Selesai') Selesai 
                                    @else($temp->proses == 'Sedang Dalam Proses') Sedang Dalam Proses
                                    @endif</span></td>
                            <td>{{($temp->selesai == NULL) ? '-':$temp->selesai}}</td>                                    
                            <td>{{$temp->keterangan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </table>
                </div>
                <div class="table-pagination py-3">
                {{ $dlitmas->links() }}
                </div>
                </div>
            </div>     
        </div> 
    </div>   

    
@endsection

