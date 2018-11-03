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

    public function assigned_fr()
    {
    	return $this->hasMany('App\FrAssignment', 'department_id');
    }

    public function assigned_drc()
    {
        return $this->hasOne('App\DrcAssignment', 'department_id');
    }
}
