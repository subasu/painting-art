<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewOrders extends Model
{
    //
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
