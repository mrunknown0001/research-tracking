<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchCoauthor extends Model
{
    public function research()
    {
    	return $this->belongsTo('App\Research', 'research_id');
    }

    public function researcher()
    {
    	return $this->belongsTo('App\User', 'co_author_id');
    }
}
