<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'room_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'image',
        'slug',
        'status',
        'locale', 'user_id',
        'deleted_at', 'created_at', 'updated_at',
    ];


    public function parent(){
        $data = $this->belongsTo(RoomType::class, 'parent_id', 'id');
        // dd($data);
        return $data;
    }

    public function children()
    {
        return $this->hasMany(RoomType::class, 'parent_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }
}
