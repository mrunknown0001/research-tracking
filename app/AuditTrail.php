<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $fillable = [
        'user_id', 'transaction',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
