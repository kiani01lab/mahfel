<?php

namespace App\Http\Controllers\Api\V1\Threads;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\Api\V1\Thread\CreateRequest;
use Domain\Threads\Factories\ThreadFactory;
use Domain\Threads\Jobs\CreateThread;
use Illuminate\Http\JsonResponse;

class StoreController extends ApiController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        CreateThread::dispatch(
            object: ThreadFactory::create(
                attributes: $request->validated()
            ),
        );

        return response()->json(
            data: null,
            status: 201,
        );
    }
}
