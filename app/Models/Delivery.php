<?php

namespace App\Models;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;

    const STATUS_PAYMENT_REQUIRED = 'PAYMEMT_REQUIRED';
    const STATUS_IN_DELIVERY = 'IN_DELIVERY';
    const STATUS_DELIVERED = 'DELIVERED';

    public static array $statuses = [
        self::STATUS_PAYMENT_REQUIRED,
        self::STATUS_IN_DELIVERY,
        self::STATUS_DELIVERED,
    ];

    protected $fillable = [
        'store_id',
        'client_id',
        'status',
        'delivered_at',
        'orders',
    ];

    protected $casts = [
        'orders' => 'array',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
