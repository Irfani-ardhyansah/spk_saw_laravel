<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function values()
    {
        return $this->hasMany('App\Value');
    }

    public function prodi()
    {
        return $this->belongsTo('App\Prodi', 'prodi_id')->orderBy('name', 'asc');
    }
}
