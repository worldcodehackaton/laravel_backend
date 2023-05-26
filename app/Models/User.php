<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_CLIENT = 'client';
    const ROLE_ADMIN = 'admin';
    const ROLE_FARMER = 'farmer';

    public static array $roles = [
        self::ROLE_CLIENT,
        self::ROLE_ADMIN,
        self::ROLE_FARMER,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFarmers(Builder $query)
    {
        return $query->where('role', User::ROLE_FARMER);
    }

    public function scopeClients(Builder $query)
    {
        return $query->where('role', User::ROLE_CLIENT);
    }

    public function scopeAdmins(Builder $query)
    {
        return $query->where('role', User::ROLE_ADMIN);
    }

    public function category(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
