<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdit extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->hasMany('App\User');
    }
    public function audit(){
        return $this->hasMany('App\Audit');
    }
    
}
