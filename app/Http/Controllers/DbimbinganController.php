<?php

namespace App\Http\Controllers;

use App\Models\Dbimbingan;
use App\Models\Rincian;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DbimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no     = 1;
        $dbimbingan   = Dbimbingan::get();
        return view('dbimbingan.index',compact('dbimbingan','no'));
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
            return redirect()->route('dbimbingan.index')->with('error', 'Maaf ! Tidak ada "Daftar Nama Petugas" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        return view('dbimbingan.create',compact('tugas'));
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
            'nama_klien'            => 'required|string|max:100',              
            'nama_petugas'          => 'required|string|max:100',
            'bimbingan'             => 'required|string|max:50',                  
            'keterangan'            => 'required|string|max:50',   
        ]);

        $dbimbingan = Dbimbingan::create([
            'nama_klien'            => $request->nama_klien,              
            'nama_petugas'          => $request->nama_petugas,
            'bimbingan'             => $request->bimbingan,
            'keterangan'            => $request->keterangan,            
        ]);

        if($dbimbingan){
            //redirect dengan pesan sukses
            return redirect()->route('dbimbingan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('dbimbingan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
            return redirect()->route('dbimbingan.index')->with('error', 'Maaf ! Tidak ada "Daftar Nama Petugas" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        $parse   = Dbimbingan::where('id',$id);
        if($parse->count() == 0){
            return redirect()->route('dbimbingan.index');
        }
        $parse = $parse->first();
        return view('dbimbingan.edit',compact('parse','tugas'));
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
        $dbimbingan     = Dbimbingan::findOrFail($id);

        $list =[
            'nama_klien'            => $request->nama_klien,
            'nama_petugas'          => $request->nama_petugas,
            'bimbingan'             => $request->bimbingan,
            'keterangan'            => $request->keterangan,            
        ];

        $dbimbingan->update($list);
        if($dbimbingan){
            //redirect dengan pesan sukses
            return redirect()->route('dbimbingan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('dbimbingan.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $dbimbingan = Dbimbingan::findOrFail($id);
        $dbimbingan->delete();

        if($dbimbingan){
            //redirect dengan pesan sukses
            return redirect()->route('dbimbingan.index')->with(['success' => 'Data Berhasil Dihapus!']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('dbimbingan.index')->with(['error' => 'Data Gagal Dihapus!']);
         }
    }

    public function detail($id)
    {
        $dbimbingan = Dbimbingan::find($id);
        $jenisdetail = Rincian::all();
        //dd($rincian);
        return view('dbimbingan.detail',['dbimbingan' => $dbimbingan, 'jenisdetail' => $jenisdetail]);
    }

    public function adddetail (Request $request, $idbimbingan)
    {
        $dbimbingan = Dbimbingan::find($idbimbingan);
        $dbimbingan->rincian()->attach($request->rincian, [
                                                            'tgl' => $request->tgl,
                                                            'uraian' => $request->uraian,
                                                            'catatan' => $request->catatan]);                                                            

        return redirect('dbimbingan/'.$idbimbingan.'/detail')->with(['success' => 'Data Berhasil Ditambah!']);
    }
}
