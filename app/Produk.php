<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['category_id', 'produk_1', 'produk_2', 'produk_3', 'desc'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
