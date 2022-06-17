<?php

namespace App\Http\Controllers;

use App\Models\Alitmas;
use App\Models\Petugas;
use Illuminate\Http\Request;

class AlitmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no         = 1;
        $alitmas   = Alitmas::get();
        return view('alitmas.index',compact('alitmas','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugas   = Petugas::get();
        if($tugas->count() == 0){
            return redirect($this->modulURL)->with('error', 'Maaf ! Tidak ada "Daftar Nama Petugas" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }

        
        return view('alitmas.create',compact('tugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi form
        $this->validate($request, [
            'nomor_surat'      => 'required|string|max:100',       
            'tgl_surat'        => 'required|date',
            'asal_permintaan'  => 'required|string|max:100',
            'inisal_nama'      => 'required|string|max:100',
            'jenis_litmas'     => 'required|string|max:100',
            'nama_petugas'     => 'required|string|max:100',
            'proses'           => 'required|string|max:50',
            'keterangan'       => 'required|string|max:50',   
        ]);

        $alitmas = Alitmas::create([
            'nomor_surat'      => $request->nomor_surat,             
            'tgl_surat'        => $request->tgl_surat,
            'asal_permintaan'  => $request->asal_permintaan,
            'inisal_nama'      => $request->inisal_nama, 
            'jenis_litmas'     => $request->jenis_litmas, 
            'nama_petugas'     => $request->nama_petugas,
            'proses'           => $request->proses,
            'selesai'          => $request->selesai,
            'keterangan'       => $request->keterangan,            
        ]);

        if($alitmas){
            //redirect dengan pesan sukses
            return redirect()->route('alitmas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('alitmas.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas   = Petugas::get();
        if($tugas->count() == 0){
            return redirect()->route('alitmas.index')->with('warning', 'Maaf ! Tidak ada "Daftar Nama Petugas" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        $parse   = Alitmas::where('id',$id);
        if($parse->count() == 0){
            return redirect()->route('alitmas.index');
        }
        $parse = $parse->first();
        return view('alitmas.edit',compact('parse','tugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alitmas     = Alitmas::findOrFail($id);

        $list =[
            'nomor_surat'      => $request->nomor_surat,             
            'tgl_surat'        => $request->tgl_surat,
            'asal_permintaan'  => $request->asal_permintaan,
            'inisal_nama'      => $request->inisal_nama, 
            'jenis_litmas'     => $request->jenis_litmas, 
            'nama_petugas'     => $request->nama_petugas,
            'proses'           => $request->proses,
            'selesai'          => $request->selesai,
            'keterangan'       => $request->keterangan,               
        ];

        $alitmas->update($list);
        if($alitmas){
            //redirect dengan pesan sukses
            return redirect()->route('alitmas.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('alitmas.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alitmas = Alitmas::findOrFail($id);
        $alitmas->delete();
        
        if($alitmas){
            //redirect dengan pesan sukses
            return redirect()->route('alitmas.index')->with(['success' => 'Data Berhasil Dihapus!']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('alitmas.index')->with(['error' => 'Data Gagal Dihapus!']);
         }
    }
}
