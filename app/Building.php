<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function sector()
    {
        $this->hasMany('App\Sector');
    }
}
