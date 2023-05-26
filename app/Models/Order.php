<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    const TYPE_RETAIL = 'RETAIL';
    const TYPE_WHOLESAIL = 'WHOLESAIL';

    public static array $types = [
        self::TYPE_RETAIL,
        self::TYPE_WHOLESAIL,
    ];

    protected $fillable = [
        'store_id',
        'client_id',
        'product_id',
        'count',
        'weight',
        'type',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
