<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alitmas extends Model
{
    use HasFactory;

    protected $table = 'alitmas';
    public $timestamps = true;
    protected $fillable = array(
                                'nomor_surat', 
                                'tgl_surat', 
                                'asal_permintaan', 
                                'inisal_nama', 
                                'jenis_litmas',
                                'nama_petugas',
                                'proses',
                                'selesai', 
                                'keterangan');
}
