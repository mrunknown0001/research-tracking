<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeClerkAssignment extends Model
{
    public function college()
    {
    	return $this->belongsTo('App\College', 'college_id')->whereActive(1);
    }
}
