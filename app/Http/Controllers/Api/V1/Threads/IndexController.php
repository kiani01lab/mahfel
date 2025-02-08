<?php

namespace App\Http\Controllers\Api\V1\Threads;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\Api\V1\Thread\ThreadResource;
use Domain\Threads\Models\Thread;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        if($this->includedFormQueryParams('author')){
            return response()->json(
                data: ThreadResource::collection(
                    resource: Thread::with('author')->published()->paginate(10)
                ),status: 200
            );
        }

        return response()->json(
            data: ThreadResource::collection(
                resource: Thread::published()->paginate(10)
            ),status: 200
        );
    }
}
