<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anouncement extends Model
{
    protected $table = 'anouncements';
    protected $guarded = [];

    public function period()
    {
        return $this->belongsTo('App\Period', 'period_id');
    }
}
