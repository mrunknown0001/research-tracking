<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeClerkAssignment extends Model
{
    public function college()
    {
    	return $this->belongsTo('App\College', 'college_id')->whereActive(1);
    }

    public function clerk()
    {
    	return $this->belongsTo('App\User', 'clerk_id')->whereActive(1);
    }
}
