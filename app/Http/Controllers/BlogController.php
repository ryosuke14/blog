<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\board;
use App\Tag;
use App\Photo;


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

    public function imgValidate(Request $request)
    {
        return $request->validate([
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    }

    public function add()
    {
        $user = Auth::user();
        //$tags = Tag::pluck('id','name')->toArray();
        return view('boards.add',['user'=>$user],['tags' =>  $this->TAGS]);
    }

    public function create(Request $request, Board $board)
    {
        $this->validate($request,board::$rules); //バリデーション
        $this->imgValidate($request);
        $uploadedFile = $this->saveImage($request->file('photo'));
        $user_id = Auth::id(); // ログインユーザIDを取得する
        $board->user_id = $user_id;
        $inputs = $request->input();
        $data = [
            'inputs'       => $inputs,
            'tags'         => Tag::find($request->tag)->pluck('tag', 'id')->toArray(),
            'uploadedFile' => str_replace('public', 'storage', $uploadedFile)
        ];
        //dd($event->user_id);

       // $event->tags()->sync($request->tags);
        $request->session()->put('data', $data);
        return view('boards.check', $data);
    }

    public function check(Request $request)
    {
        return view('boards.');
    }

    public function saveImage($file)
    {
        return $file->storeAs('public/tmp_images', $file->hashName());
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


