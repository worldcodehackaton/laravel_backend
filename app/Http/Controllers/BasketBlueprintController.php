<?php

namespace App\Http\Controllers;

use App\DTO\BasketBlueprintDto;
use App\Http\Resources\Collections\BasketBlueprintCollection;
use App\Repositories\BasketBlueprintRepository;
use App\Services\BasketBlueprintService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BasketBlueprintController extends Controller
{
    public function __construct(
        private BasketBlueprintRepository $repository,
        private BasketBlueprintService $service,
    ) {
    }

    public function index(Request $request): BasketBlueprintCollection
    {
        return new BasketBlueprintCollection($this->repository->all());
    }

    public function store(Request $request)
    {
        $this->service->store(BasketBlueprintDto::fromRequest($request));

        return response('', Response::HTTP_OK);
    }
}
