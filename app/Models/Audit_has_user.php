<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit_has_user extends Model
{
    protected $guarded = [];

    public function user()
	{
		return $this->hasMany('App\User');
	}
}
