<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterias';
    protected $guarded = [];

    public function admin(){
    	return $this->belongsTo('App\Admin', 'admin_id');
    }

    public function weights(){
    	return $this->hasMany('App\Weight');
    }
}
