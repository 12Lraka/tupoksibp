<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abimbingan extends Model
{
    use HasFactory;

    protected $table = 'abimbingan';
    public $timestamps = true;
    protected $fillable = array(
                                'putusan', 
                                'registrasi',
                                'inisial_nama',
                                'nama_petugas',
                                'bimbingan',
                                'keterangan');

    public function rincian()
    {
        return $this->belongsToMany('App\Models\Rincian')->withPivot(['tgl', 'uraian', 'catatan'])->withTimeStamps();
    }
}
