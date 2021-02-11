<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_period extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function period()
    {
        return $this->belongsTo('App\Period', 'period_id');
    }
}
