<?php

namespace App;

use Cartalyst\Stripe\Api\Orders;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'slug', 'price', 'details', 'description', 'cover'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
