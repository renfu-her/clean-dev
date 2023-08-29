<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 首頁
    public function index()
    {
        return view('frontend.index');
    }

    
}
