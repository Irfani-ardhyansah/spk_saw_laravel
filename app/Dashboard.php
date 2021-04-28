<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $guarded = [];

    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
