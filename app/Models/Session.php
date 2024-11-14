<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('price', 'quantity')
            ->withTimestamps();
    }

    protected $fillable = [
        'movie_id',
        'theater_id',
        'date',
        'time',
        'ticket_price',
        'available_seats',
    ];
}
