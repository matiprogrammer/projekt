<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'user_id',
        'equipment_id',
        'quantity',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }
}
