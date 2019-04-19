<?php

namespace App;

use Cartalyst\Stripe\Api\Orders;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }
}
