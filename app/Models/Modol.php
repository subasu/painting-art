<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modol extends Model
{
    //
    protected $table = 'models';
    public function sizes()
    {
        return $this->hasMany('App\Models\Size','model_id');
    }
}
