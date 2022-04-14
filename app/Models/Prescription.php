<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';
    protected $guarded = [];

    public function userDetails()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
