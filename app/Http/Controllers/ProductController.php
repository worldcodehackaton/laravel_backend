<?php

namespace App\Http\Controllers;

use App\DTO\ProductDTO;
use App\Http\Resources\Collections\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        public ProductRepository $repository,
        public ProductService $service,
    ) {
    }

    public function index(Request $request): ProductCollection
    {
        return new ProductCollection($this->repository->all());
    }

    public function show(Request $request, Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $this->service->store(ProductDTO::fromRequest($request));

        return response('', Response::HTTP_OK);
    }
}
