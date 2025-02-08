<?php

namespace App\Http\Controllers\Api\V1\Threads;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\Api\V1\Thread\ThreadResource;
use Domain\Threads\Models\Thread;
use Illuminate\Http\JsonResponse;

class ShowController extends ApiController
{
    public function __invoke(Thread $thread): JsonResponse
    {
        if($this->includedFormQueryParams('author')){
            return response()->json(
                data: new ThreadResource($thread->load('author')),
                status: 200,
            );
        }

        return response()->json(
            data: new ThreadResource($thread),
            status: 200,
        );
    }
}
