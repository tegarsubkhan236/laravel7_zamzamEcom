<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'marketing_id',
        'customer_id',
        'dp',
        'sample',
        'desc',
        'deadline',
        'status',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function marketing()
    {
        return $this->belongsTo(User::class, 'marketing_id');
    }

    public function designer()
    {
        return $this->belongsTo(User::class, 'designer_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('quantity');
    }

    // protected $dateFormat = 'U';
}
