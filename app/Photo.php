<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function board()
    {
        return $this->hasOne('App\Board');
    }
}
