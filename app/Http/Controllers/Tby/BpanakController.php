<?php

namespace App\Http\Controllers\Tby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Abimbingan;

class BpanakController extends Controller
{
    public function index()
    {
        //$abimbingan = Abimbingan::get();
        $abimbingan = DB::table('abimbingan')->paginate(10);
        return view('bpanak.index', ['abimbingan' => $abimbingan]);
    }
}
