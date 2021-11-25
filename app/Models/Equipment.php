<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'photo',
        'desc',
        'url',
        'quantity'

    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function filterAttribute($tags=array('')){

    }

    public function rentals()   
    {
        return $this->hasMany(Rental::class);
    }

    public function availableQuantityAttribute()
    {
        $rentals = $this->rentals;
        $rentQuantity = 0;
        foreach ($rentals as $rental) {
            $rentQuantity += $rental->quantity;
        }
        
        return $this->quantity - $rentQuantity;
    }
}
