<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $primaryKey = 'BlogID';

    public function keywords(){
    	return $this->hasMany('App\BlogKeyword','BlogID');
    }
}
