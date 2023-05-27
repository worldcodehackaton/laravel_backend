<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpTip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'markup',
        'for_role',
    ];

    public function scopeForClients(Builder $query)
    {
        return $query->where('for_role', User::ROLE_CLIENT);
    }

    public function scopeForAdmins(Builder $query)
    {
        return $query->where('for_role', User::ROLE_ADMIN);
    }

    public function scopeForFarmers(Builder $query)
    {
        return $query->where('for_role', User::ROLE_FARMER);
    }
}
