<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Acesso extends Model
{   
    protected $fillable = ['user_id','status','so','host','ip'];
}
