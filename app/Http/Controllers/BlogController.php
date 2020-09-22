<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\board;



class BlogController extends Controller
{
    protected $TAGS = ['sports' => 'スポーツ', 'travel' => '旅行', 'music' => '音楽'];

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
        return view('boards.index',['user'=>$user],['tags' =>  $this->TAGS]);    
    }

    public function add()
    {
        $user = Auth::user();
        //$tags = Tag::pluck('id','name')->toArray();
        return view('boards.add',['user'=>$user],['tags' =>  $this->TAGS]);
    }

    public function create(Request $request)
    {

        $this->validate($request,board::$rules); //バリデーション
        $user_id = Auth::id(); // ログインユーザIDを取得する
        $board = new board;
        $board->title = $request->title;
        $board->text = $request->text;
        $board->user_id = $user_id;
        $board->tag = $request->tag;
        //dd($event->user_id);

       // $event->tags()->sync($request->tags);
        $board->save();
        return redirect('/');
    }

    public function edit($id)
    {
        $user = Auth::user();
       // $data = $request->$event->id;
        $board = board::find($id);
        return view('board.edit',['board'=>$board],['user'=>$user]);
    }


    public function blog()
    {
        return view('blog');
    }
}


