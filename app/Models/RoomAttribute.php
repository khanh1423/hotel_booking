<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAttribute extends Model
{
    use HasFactory;

    protected $table = 'room_attributes';

    protected $fillable = [
        'attribute_id',
        'room_id',
        'value',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
