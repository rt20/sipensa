<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
	#agar bisa entri/edit data
	protected $guarded = [];
	protected $casts = [
		'jenis_keg' => 'array',
		'kesimpulan' => 'array',
		'rating_produksi' => 'array',
		'rating_distribusi' => 'array',
		
    ];
    public function budget()
	{
		return $this->belongsTo(Budget::class, 'budget_id');
	}

	public function sarana()
	{
		return $this->belongsTo(Sarana::class, 'sarana_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
 