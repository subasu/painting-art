<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $table="gallerycategories";
    public function gallery()
    {
        return $this->hasMany('App/Models/Gallery','galleryCategories_id');
    }
}
