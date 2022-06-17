<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendampingan extends Model
{
    use HasFactory;

    protected $table = 'pendampingan';
    public $timestamps = true;
    protected $fillable = array(
                                'nomor_surat', 
                                'asal_surat', 
                                'inisial_nama', 
                                'nama_petugas', 
                                'proses', 
                                'selesai', 
                                'keterangan');
}
