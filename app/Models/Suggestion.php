<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $table = 'suggestions';
    protected $guarded = [];
    
    public function userDetails()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
