<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'sample',
        'desc',
        'status',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('quantity');
    }

    // protected $dateFormat = 'U';
}
