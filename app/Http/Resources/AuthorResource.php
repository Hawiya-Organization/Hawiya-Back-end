<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_user' => get_class($this->resource) == User::class,
            'bio' => $this->bio,
            'poems' => $this->whenLoaded('poems'),
            'poems_count' => $this->whenLoaded('poems', function () {
                return $this->poems->groupBy('bahr_type_id')->map(function ($poems) {
                    return $poems->count();
                });
            }),

        ];
    }
}
