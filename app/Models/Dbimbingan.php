<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbimbingan extends Model
{
    use HasFactory;

    protected $table = 'dbimbingan';
    public $timestamps = true;
    protected $fillable = array(
                                'nama_klien', 
                                'nama_petugas', 
                                'bimbingan',
                                'keterangan');
    
    public function rincian()
    {
        return $this->belongsToMany('App\Models\Rincian')->withPivot(['tgl', 'uraian', 'catatan'])->withTimeStamps();
    }
}
