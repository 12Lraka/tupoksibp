<?php

namespace App\Http\Controllers\Tby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alitmas;

class LitmasanakController extends Controller
{
    public function index()
    {
        //$alitmas = alitmas::get();
        $alitmas = DB::table('alitmas')->paginate(10);
        return view('litmasanak.index', ['alitmas' => $alitmas]);
    }
}
