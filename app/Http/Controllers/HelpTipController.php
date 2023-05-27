<?php

namespace App\Http\Controllers;

use App\DTO\HelpTipDto;
use App\Http\Requests\HelpTipRoleRequest;
use App\Http\Resources\Collections\HelpTipCollection;
use App\Repositories\HelpTipRepository;
use App\Services\HelpTipService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelpTipController extends Controller
{
    public function __construct(
        public HelpTipRepository $repository,
        public HelpTipService $service,
    ) {
    }

    public function index(HelpTipRoleRequest $request): HelpTipCollection
    {
        $forRole = $request->input('for_role');

        $tips = $this->repository->forRoleFactory($forRole);

        return new HelpTipCollection($tips);
    }

    public function store(Request $request)
    {
        $this->service->store(HelpTipDto::fromRequest($request));

        return response('', Response::HTTP_OK);
    }
}
