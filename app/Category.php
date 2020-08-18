<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'price',
    ];

    public function produk()
    {
        return $this->hasMany('App\Produk');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
