<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function carts():HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function avgReviews() {
        if($this->reviews()->count() > 0) {
            $all = $this->reviews()->sum('rating');
            $avgRating  = $all / $this->reviews()->count(); 
            return number_format($avgRating,1);
        }else {
            return null;
        }
    }

}
