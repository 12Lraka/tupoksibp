<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    use HasFactory;
    protected $table = 'rincian';
    public $timestamps = true;
    protected $fillable = ['jenis_bimbingan'];
    
    public function dbimbingan()
    {
        return $this->belongsToMany('App\Models\Dbimbingan')->withPivot(['tgl', 'uraian', 'catatan']);
    } 

    public function abimbingan()
    {
        return $this->belongsToMany('App\Models\Abimbingan');
    } 
}
