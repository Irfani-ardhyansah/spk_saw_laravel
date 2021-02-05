<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $table = 'weights';
    protected $guarded = [];
    
    public function criteria(){
    	return $this->belongsTo('App\Criteria', 'criteria_id');
    }
}
