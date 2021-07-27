<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    protected $guarded = [];

    public function audit(){
        return $this->hasMany(Audit::class, 'saranas_id');
    }
}
