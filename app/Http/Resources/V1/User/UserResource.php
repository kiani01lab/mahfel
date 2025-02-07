<?php

namespace App\Http\Resources\V1\User;

use App\Http\Resources\V1\Thread\ThreadResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                $this->mergeWhen($request->routeIs('api:v1:users:*'),[
                    'email_verified_at' => $this->email_verified_at,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ])
            ],
            'includes' => [
                ThreadResource::collection($this->whenLoaded('threads')),
            ],
            'links' => [
                'self' => route('api:v1:users:show', ['user' => $this->id]),
            ]
        ];
    }
}
