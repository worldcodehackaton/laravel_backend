<?php

namespace App\Http\Controllers;

use App\DTO\ReviewDto;
use App\Http\Resources\Collections\ReviewCollection;
use App\Repositories\ReviewRepository;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    public function __construct(
        private ReviewRepository $repository,
        private ReviewService $service,
    ) {
    }

    public function index(Request $request): ReviewCollection
    {
        return new ReviewCollection($this->repository->all());
    }

    public function store(Request $request)
    {
        $this->service->store(ReviewDto::fromRequest($request));

        return response('', Response::HTTP_OK);
    }
}
