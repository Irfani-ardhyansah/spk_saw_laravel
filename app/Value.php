<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $guarded = [];

    public function period()
    {
    	return $this->belongsTo('App\Period', 'period_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'mahasiswa_id');
    }

    public function criteria()
    {
        return $this->belongsTo('App\Criteria', 'criteria_id');
    }
}
