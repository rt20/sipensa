<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stugas_has_user extends Model
{
    protected $guarded = [];

    public function user()
	{
		return $this->hasMany('App\User');
	}
	public function stugas()
	{
		return $this->hasMany('App\Stugas');
	}
}
