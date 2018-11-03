<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = [
        'name', 'code',
    ];

    public function departments()
    {
    	return $this->hasMany('App\CollegeDepartment', 'college_id', 'id');
    }
}
