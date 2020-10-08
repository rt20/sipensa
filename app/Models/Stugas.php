<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stugas extends Model
{
    protected $guarded = [];
	protected $casts = [
		'user_id' => 'array',	
    ];
    public function budget()
	{
		return $this->belongsTo(Budget::class, 'budget_id');
	}
	public function subdit()
	{
		return $this->belongsTo(Subdit::class, 'subdit_id');
	}
	public function sarana()
	{
		return $this->belongsTo(Sarana::class, 'sarana_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function audit(){
        return $this->hasMany('App\Audit');
    }
}

