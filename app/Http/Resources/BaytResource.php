<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaytResource extends JsonResource
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
            'content' => json_decode($this->content),
            'poem_title' => $this->poem?->title,
            'poem_author' => $this->poem?->authorable?->name,
            'poem_id'=>$this->poem_id
        ];
    }
}
