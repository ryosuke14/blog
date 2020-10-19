<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Board;
use App\Tag;



class BlogController extends Controller
{
    protected $TAGS = ['sports' => 'スポーツ', 'travel' => '旅行', 'music' => '音楽'];

    public function index (Board $board)
    {
        $user = Auth::user();
        $user_id = Auth::id();
        //$sort = $request->sort;
        $boards = $board->orderBy('created_at', 'desc')->paginate(5);

        //return view('events.index',['events'=>$events], ['tags' =>  $this->TAGS], ['user' => $user]);
        return view('boards.index',['user'=>$user, 'boards'=>$boards, 'tags' =>  $this->TAGS]);    
    }

    public function add(Tag $tag)
    {
        $user = Auth::user();
        $tags = $tag->all();
        return view('boards.add',['user'=>$user, 'tags' => $tags]);
    }

    public function imgValidate(Request $request)
    {
        return $request->validate([
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    }

    public function check(Request $request, Tag $tag)
    {
        $user_id = Auth::id();        
        $inputs = $request->input();
        $this->validate($request,board::$rules);
        $this->imgValidate($request);
        $uploadedFile = $this->saveImage($request->file('photo'));
        $data = [
            'inputs'       => $inputs,
            'user_id'      => $user_id,
            'uploadedFile' => str_replace('public', 'storage', $uploadedFile),
            'tags'         => Tag::find($request->tag)->pluck('tag', 'id')->toArray(),
        ];
        $request->session()->put('data', $data);

        return view('boards.check', $data);
    }

    private function saveImage($file)
    {
        return $file->storeAs('public/tmp_images', $file->hashName());
    }


    public function created(Request $request, Board $board, Tag $tag)
    {
        $user_id = Auth::id(); 
        $board->title = $request->title;
        $board->text = $request->text;
        $board->user_id = $user_id;

        $data = $request->session()->get('data');
        $tmp_path = $data['uploadedFile'];
        $filename = str_replace('storage/tmp_images', '', $tmp_path);
        $storage_path = 'public/images' . $filename;
        $tmp = str_replace('storage/', 'public/', $tmp_path);
        $request->session()->forget('data');
        Storage::move($tmp, $storage_path);
        
        $board->photo = $filename;
        $board->save();

        foreach ($request->tag as $tg) {
            $tag->board()->attach(
                ['board_id' => $board->id],
                ['tag_id' => $tg]
            );
        }
        return view('boards.created');
    }

    public function edit($id)
    {
        $user = Auth::user();
       // $data = $request->$event->id;
        $board = board::find($id);
        return view('board.edit',['board'=>$board],['user'=>$user]);
    }


    public function blog(Board $board, Tag $tag, $id)
    {
        //dd($board);
        $boards = $board->find($id);
        //dd($boards);
        $user = Auth::user();
        
        return view('detail.blog',compact('id'),['boards' => $boards],['Tag'=> $tag],['user'=>$user]);
    }

    public function comment(Request $request, comment $comment)
    {
        $comment->comment_name = $request->comment_name;
        $comment->comment_text = $request->comment_text;
        $user = Auth::user();
        $comment->save();


        return view('index',compact('id'),['boards' => $boards],['user'=>$user],['Tag'=> $tag],['comment'=>$comment]);
    }


}


