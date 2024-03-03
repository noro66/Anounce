<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'announce_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function announces()
    {
        return $this->belongsTo(Announce::class, 'announce_id');
    }
}
