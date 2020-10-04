<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function board()
    {
        return $this->belongsToMany('App\board', 'board_tag', 'tag_id', 'board_id');
    }
}
