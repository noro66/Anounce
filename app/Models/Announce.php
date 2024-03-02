<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announce extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'type',
        'reservation_type',
        'image',
        'user_id',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
