<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index (Request $request)
    {
        return view('index');
    }

    public function blog()
    {
        return view('blog');
    }
}