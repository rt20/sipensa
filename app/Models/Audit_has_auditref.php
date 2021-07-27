<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit_has_auditref extends Model
{
    protected $guarded = [];
	protected $casts = [
	'auditref' => 'array',
	];
	// public function audit()
	// {
	// 	return $this->hasMany('App\Audit');
	// }
}
