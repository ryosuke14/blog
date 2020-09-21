<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;


class BlogController extends Controller
{
    public function index (Request $request)
    {
        //$tags = Tag::pluck('id','name')->toArray();
        //dd($tags);
        $user = Auth::user();
        $user_id = Auth::id();
        //$sort = $request->sort;
        //$boards = DB::table('boards')->simplePaginate(5);
        //dd($user->name);
        //return view('events.index',['events'=>$events], ['tags' =>  $this->TAGS], ['user' => $user]);
        return view('boards.index',['user'=>$user]);    
    }

    public function add()
    {
        $user = Auth::user();
        //$tags = Tag::pluck('id','name')->toArray();
        return view('boards.add',['user'=>$user]);
    }


    public function blog()
    {
        return view('blog');
    }
}


