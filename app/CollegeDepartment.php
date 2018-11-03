<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeDepartment extends Model
{
	protected $fillable = [
        'name',
    ];
    
    public function college()
    {
    	return $this->belongsTo('App\College', 'college_id');
    }
}
