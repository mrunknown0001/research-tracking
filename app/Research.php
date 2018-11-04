<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    public function co_author()
    {
    	return $this->hasMany('App\ResearchCoauthor', 'research_id');
    }
}
