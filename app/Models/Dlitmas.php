<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dlitmas extends Model
{
    use HasFactory;

    protected $table = 'dlitmas';
    public $timestamps = true;
    protected $fillable = array(
                                'asal_permintaan', 
                                'tgl_surat', 
                                'nama_klien', 
                                'jenis_litmas', 
                                'nama_petugas', 
                                'proses', 
                                'selesai', 
                                'keterangan');
}
