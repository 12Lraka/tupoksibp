<?php

namespace App\Http\Controllers;

use App\Models\Abimbingan;
use App\Models\Rincian;
use App\Models\Petugas;
use Illuminate\Http\Request;

class AbimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no     = 1;
        $abimbingan   = Abimbingan::get();
        return view('abimbingan.index',compact('abimbingan','no'));
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
            return redirect()->route('abimbingan.index')->with('error', 'Maaf ! Tidak ada "Daftar Nama Petugas" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        return view('abimbingan.create',compact('tugas'));
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
            'putusan'               => 'required|string|max:191',              
            'registrasi'            => 'required|string|max:191',
            'inisial_nama'          => 'required|string|max:191',
            'nama_petugas'          => 'required|string|max:191',
            'bimbingan'             => 'string',                       
            'keterangan'            => 'required|string|max:50',   
        ]);

        $abimbingan = Abimbingan::create([
            'putusan'               => $request->putusan, 
            'registrasi'            => $request->registrasi, 
            'inisial_nama'          => $request->inisial_nama,
            'nama_petugas'          => $request->nama_petugas,
            'bimbingan'             => $request->bimbingan,
            'keterangan'            => $request->keterangan,            
        ]);

        if($abimbingan){
            //redirect dengan pesan sukses
            return redirect()->route('abimbingan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('abimbingan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
            return redirect()->route('abimbingan.index')->with('error', 'Maaf ! Tidak ada "Daftar Nama Petugas" yang dimasukkan ke dalam sistem, hubungi Administrator untuk menyelesaikan permasalahan ini.');
        }
        $parse   = Abimbingan::where('id',$id);
        if($parse->count() == 0){
            return redirect()->route('abimbingan.index');
        }
        $parse = $parse->first();
        return view('abimbingan.edit',compact('parse','tugas'));
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
        $abimbingan     = Abimbingan::findOrFail($id);

        $list =[
            'putusan'               => $request->putusan, 
            'registrasi'            => $request->registrasi, 
            'inisial_nama'          => $request->inisial_nama,
            'nama_petugas'          => $request->nama_petugas,
            'bimbingan'             => $request->bimbingan,
            'keterangan'            => $request->keterangan,            
        ];

        $abimbingan->update($list);
        if($abimbingan){
            //redirect dengan pesan sukses
            return redirect()->route('abimbingan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('abimbingan.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $abimbingan = Abimbingan::findOrFail($id);
        $abimbingan->delete();

        if($abimbingan){
            //redirect dengan pesan sukses
            return redirect()->route('abimbingan.index')->with(['success' => 'Data Berhasil Dihapus!']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('abimbingan.index')->with(['error' => 'Data Gagal Dihapus!']);
         }
    }

    public function detail($id)
    {
        $abimbingan = Abimbingan::find($id);
        $jenisdetail = Rincian::all();
        //dd($rincian);
        return view('abimbingan.detail',['abimbingan' => $abimbingan, 'jenisdetail' => $jenisdetail]);
    } 

    public function adddetail (Request $request, $idbimbingan)
    {
        $abimbingan = Abimbingan::find($idbimbingan);
        $abimbingan->rincian()->attach($request->rincian, [
                                                            'tgl' => $request->tgl,
                                                            'uraian' => $request->uraian,
                                                            'catatan' => $request->catatan]);                                                            

        return redirect('abimbingan/'.$idbimbingan.'/detail')->with(['success' => 'Data Berhasil Ditambah!']);
    }
}
