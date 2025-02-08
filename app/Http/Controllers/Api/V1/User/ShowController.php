<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\Api\V1\User\UserResource;
use Domain\Shared\Models\User;

class ShowController extends ApiController
{
    public function __invoke(User $user)
    {
        if ($this->includedFormQueryParams('threads')){
            return response()->json(
                data: new UserResource($user->load('threads')),
                status: 200,
            );
        }

        return response()->json(
            data: new UserResource($user),
            status: 200,
        );
    }
}
