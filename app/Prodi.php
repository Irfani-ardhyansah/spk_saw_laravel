<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasOne('App\Prodi');
    }
}
