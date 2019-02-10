<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormRequest extends Model
{
    protected $fillable = [
    	'filename', 
    ];


    public function researcher()
    {
    	return $this->belongsTo('App\User', 'researcher_id');
    }

    public function drc()
    {
        return $this->belongsTo('App\User', 'drc_id');
    }

    public function form()
    {
    	return $this->belongsTo('App\Form', 'form_id');
    }
}
