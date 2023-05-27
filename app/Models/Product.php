<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    const CALC_TYPE_WEIGHT = 'weight';
    const CALC_TYPE_COUNT = 'count';

    public static array $calcTypes = [
        self::CALC_TYPE_COUNT, self::CALC_TYPE_WEIGHT,
    ];

    protected $fillable = [
        'name',
        'price',
        'description',
        'store_id',
        'category_id',
        'calc_type',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
