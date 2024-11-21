<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Если role используется в проекте
        'city_id', // Если используется city_id
    ];

    /**
     * Атрибуты, которые скрываются при сериализации.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Атрибуты, которые должны быть приведены к определённым типам.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Связь пользователя с сессиями (many-to-many).
     */
    public function sessions()
    {
        return $this->belongsToMany(Session::class)
            ->withPivot('price', 'quantity')
            ->withTimestamps();
    }
}
