<?php

namespace App\Http\Resources\Api\V1\Thread;

use App\Http\Resources\Api\V1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'thread',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'body' => $this->when(
                    $request->routeIs('api:v1:threads:show'),
                    $this->body
                ),
                'published' => $this->published,
                'createdAt' => $this->created_at,
            ],
            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->id,
                    ],
                    'links' => [
                        'self' => route('api:v1:users:show', ['user' => $this->user_id])
                    ]
                ]
            ],
            'includes' => [
              new UserResource($this->whenLoaded('author')),
            ],
            'links' => [
                'self' => route('api:v1:threads:show', ['thread' => $this->id]),
            ],
        ];
    }
}
