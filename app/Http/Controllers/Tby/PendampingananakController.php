<?php

namespace App\Http\Controllers\Tby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendampingan;

class PendampingananakController extends Controller
{
    public function index()
    {
        //$pendampingan = pendampingan::get();
        $pendampingan = DB::table('pendampingan')->paginate(10);
        return view('pendampingananak.index', ['pendampingan' => $pendampingan]);
    }
}
