<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;



class DepanController extends Controller
{
    public function index()
    {
        $about = DB::table('abouts')->first();
        return view('depan.index', compact('about'));
    }
}



