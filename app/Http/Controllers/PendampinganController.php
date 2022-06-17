<?php

namespace App\Http\Controllers;

use App\Models\Pendampingan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PendampinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no           = 1;
        $pendamping   = Pendampingan::get();
        return view('pendampingan.index',compact('pendamping','no'));
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

        return view('pendampingan.create',compact('tugas'));
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
            'asal_surat'       => 'required|string|max:100',
            'inisial_nama'     => 'required|string|max:100',
            'nama_petugas'     => 'required|string|max:100',
            'proses'           => 'required|string|max:50',
            'keterangan'       => 'required|string|max:50',   
        ]);

        $pendamping   = Pendampingan::create([
            'nomor_surat'      => $request->nomor_surat, 
            'asal_surat'       => $request->asal_surat, 
            'inisial_nama'     => $request->inisial_nama, 
            'nama_petugas'     => $request->nama_petugas,
            'proses'           => $request->proses,
            'selesai'          => $request->selesai,
            'keterangan'       => $request->keterangan,            
        ]);

        if($pendamping){
            //redirect dengan pesan sukses
            return redirect()->route('pendampingan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pendampingan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
            return redirect()->route('pendampingan.index')->with('error', 'Maaf ! Tidak ada "Daftar Nama Petugas" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        $parse   = Pendampingan::where('id',$id);
        if($parse->count() == 0){
            return redirect()->route('pendampingan.index');
        }
        $parse = $parse->first();
        return view('pendampingan.edit',compact('parse','tugas'));
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
        $old     = Pendampingan::findOrFail($id);

        $list =[
            'nomor_surat'      => $request->nomor_surat, 
            'asal_surat'       => $request->asal_surat, 
            'inisial_nama'     => $request->inisial_nama, 
            'nama_petugas'     => $request->nama_petugas,
            'proses'           => $request->proses,
            'selesai'          => $request->selesai,
            'keterangan'       => $request->keterangan,           
        ];

        $pendamping->update($list);
        if($pendamping){
            //redirect dengan pesan sukses
            return redirect()->route('pendampingan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pendampingan.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $pendamping = Pendampingan::findOrFail($id);
        $pendamping->delete();
        
        if($pendamping){
            //redirect dengan pesan sukses
            return redirect()->route('pendampingan.index')->with(['success' => 'Data Berhasil Dihapus!']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('pendampingan.index')->with(['error' => 'Data Gagal Dihapus!']);
         }
    }
}
