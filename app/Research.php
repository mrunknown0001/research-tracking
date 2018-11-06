<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
	protected $fillable = [
		'title', 'tracking_number', 'time_posted',
	];

	public function author()
	{
		return $this->belongsTo('App\User', 'author_id');
	}

    public function co_author()
    {
    	return $this->hasMany('App\ResearchCoauthor', 'research_id');
    }
}
