<?php

namespace App\Jobs;

use App\DTO\BasketBlueprintDto;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Repositories\BasketRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StoreRepository;
use App\Repositories\UserRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BasketBlueprintToOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Product $product;
    private Store $store;
    private User $client;
    private string $count;
    private string $weight;
    private string $order_at;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BasketBlueprintDto $dto)
    {
        $this->product = app(ProductRepository::class)->findOrFail($dto->product_id);
        $this->store = app(StoreRepository::class)->findOrFail($dto->store_id);
        $this->client = app(UserRepository::class)->findOrFail($dto->client_id);
        $this->count = $dto->count;
        $this->weight = $dto->weight;
        $this->order_at = $dto->order_at;

        $this->onQueue('basket-blueprint-to-order');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
