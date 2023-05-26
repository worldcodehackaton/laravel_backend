<?php

namespace App\Models;

use App\Repositories\StoreRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id', 'description',
    ];

    protected $appends = ['rate'];

    public function getRateAttribute(): float
    {
        /** @var StoreRepository $repository */
        $repository = app(StoreRepository::class, ['model' => $this]);

        return $repository->getAvgRate();
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
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
