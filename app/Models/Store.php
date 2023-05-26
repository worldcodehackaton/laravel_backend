<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate', 'farmer_id',
        'description',
    ];

    protected $appends = ['rate'];

    public function getRateAttribute(): int
    {
        return 1;
    }

    public function farmer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'farmer_id', 'id');
    }

    public function contactInfo(): HasOne
    {
        return $this->hasOne(ContactInfo::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
