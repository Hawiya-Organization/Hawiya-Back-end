<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoemResource extends JsonResource
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
            'title' => $this->title,
            'author_name' => $this->authorable?->name,
            'bio' => $this->authorable?->bio,
            'bayts' => $this->whenLoaded('bayts'),
            'bahr_type' => $this->bahrType->name,
            'is_hor' => $this->is_hor,


        ];
    }
}
