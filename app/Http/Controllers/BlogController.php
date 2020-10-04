<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\board;
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
        $boards = DB::table('boards')->simplePaginate(5);
        //dd($user->name);
        //return view('events.index',['events'=>$events], ['tags' =>  $this->TAGS], ['user' => $user]);
        return view('boards.index',['user'=>$user],['boards'=>$boards],['tags' =>  $this->TAGS]);    
    }

    public function add()
    {
        $user = Auth::user();
        //$tags = Tag::pluck('id','name')->toArray();
        return view('boards.add',['user'=>$user],['tags' =>  $this->TAGS]);
    }

    public function imgValidate(Request $request)
    {
        return $request->validate([
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    }

    public function check(Request $request)
    {
        $inputs = $request->input();
        $this->validate($request,board::$rules);
        $this->imgValidate($request);
        $uploadedFile = $this->saveImage($request->file('photo'));
        $data = [
            'inputs'       => $inputs,
            'uploadedFile' => str_replace('public', 'storage', $uploadedFile),
        ];

        return view('boards.check', $data);
    }

    private function saveImage($file)
    {
        return $file->storeAs('public/tmp_images', $file->hashName());
    }


    public function create(Request $request, Board $board, Photo $photo)
    {

        $this->validate($request,board::$rules); //バリデーション
        $user_id = Auth::id(); // ログインユーザIDを取得する
        $board->title = $request->title;
        $board->text = $request->text;
        $board->user_id = $user_id;

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


