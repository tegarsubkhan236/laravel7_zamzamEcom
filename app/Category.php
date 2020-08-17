<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function produk()
    {
        return $this->hasMany('App\Produk');
    }
}
