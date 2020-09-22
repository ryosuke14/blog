<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class board extends Model
{

    public static $rules = array(
        'title' => 'required|min:3',
        'text' => 'required',
    );
}
