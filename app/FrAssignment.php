<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrAssignment extends Model
{
    public function college()
    {
    	return $this->belongsTo('App\College', 'college_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\CollegeDepartment', 'department_id');
    }
}
