<?php

namespace App\Services;

use App\DTO\ProductDTO;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductService
{
    private ProductRepository $repository;

    public function __construct(
        private Product $product
    ) {
        $this->repository = app(ProductRepository::class, ['model' => $product]);
    }

    public function store(ProductDTO $dto): static
    {
        DB::beginTransaction();

        $this->repository
            ->fill($dto->toArray())
            ->save()
            ->saveMediaBatch($dto->images);

        DB::commit();

        return $this;
    }
}
