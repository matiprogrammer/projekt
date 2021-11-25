<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentTag extends Model
{
    public $table = 'equipment_tag';
    use HasFactory;

    protected $fillable = [
        'equipment_id',
        'tag_id'
    ];

    public $timestamps = false;
}
