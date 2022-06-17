<?php

namespace App\Http\Controllers\Tby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dbimbingan;

class BimbingandewasaController extends Controller
{
    public function index()
    {
        //$dbimbingan = dbimbingan::get();        
        $dbimbingan = DB::table('dbimbingan')->paginate(10);
        return view('bimbingandewasa.index', ['dbimbingan' => $dbimbingan]);
    }
}
