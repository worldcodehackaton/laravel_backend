<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        public ProductRepository $repository
    )
    {

    }

    public function index(Request $request): ProductCollection
    {
        return new ProductCollection($this->repository->all());
    }

    public function show(Request $request, Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
