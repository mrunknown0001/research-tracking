<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'id_number', 'user_type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function collegeClerkAssignment()
    {
        return $this->hasOne('App\CollegeClerkAssignment', 'clerk_id');
    }

    public function drcAssignment()
    {
        return $this->hasOne('App\DrcAssignment', 'drc_id');
    }

    public function frAssignment()
    {
        return $this->hasOne('App\FrAssignment', 'fr_id');
    }

    public function researches()
    {
        return $this->hasMany('App\Research', 'author_id');
    }

    public function co_research()
    {
        return $this->hasMany('App\ResearchCoauthor', 'co_author_id');
    }

}
