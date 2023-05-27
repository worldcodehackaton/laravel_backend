<?php

namespace App\Models;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_PAYMENT_REQUIRED = 'PAYMEMT_REQUIRED';
    const STATUS_PAID = 'PAID';
    const STATUS_IN_DELIVERING = 'IN_DELIVERING';
    const STATUS_DELIVERED = 'DELIVERED';
    const STATUS_CANCELED = 'CANCELED';

    const TYPE_RETAIL = 'RETAIL';
    const TYPE_WHOLESAIL = 'WHOLESAIL';

    public static array $types = [
        self::TYPE_RETAIL,
        self::TYPE_WHOLESAIL,
    ];

    public static array $statuses = [
        self::STATUS_PAYMENT_REQUIRED,
        self::STATUS_IN_DELIVERING,
        self::STATUS_DELIVERED,
        self::STATUS_CANCELED,
    ];

    // FIXME: basket without array of ids
    protected $fillable = [
        'store_id',
        'client_id',
        'product_id',
        'status',
        'delivered_at',
        'count',
        'weight',
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
