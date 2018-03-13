<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table="galleries";
    public function GalleryCategory()
    {
        return $this->belongsTo('App/Models/GalleryCategory');
    }
}
