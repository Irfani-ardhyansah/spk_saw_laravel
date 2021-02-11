<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $guarded = [];
    
    public function admin()
    {
    	return $this->belongsTo('App\Admin', 'admin_id');
    }

    public function values()
    {
        return $this->hasMany('App\Value');
    }

    public function user_periods()
    {
        return $this->hasMany('App\User_period');
    }
}
