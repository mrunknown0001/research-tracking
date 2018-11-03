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
        'firstname', 'lastname', 'id_number', 'user_type', 'password',
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
}
