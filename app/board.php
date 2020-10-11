<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class board extends Model
{

    public static $rules = array(
        'title' => 'required|min:3',
        'text' => 'required',
    );

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'board_tag', 'board_id', 'tag_id');
    }

    public function photo()
    {
        return $this->hasOne('App\Photo');
    }
}
