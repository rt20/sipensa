<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capa extends Model
{
    protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function audit()
    {
        return $this->belongsTo(Audit::class,'audit_id');
    }
	
}
