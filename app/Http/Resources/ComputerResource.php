<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComputerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'computer_number' => $this->id,
            'computer_title' => $this->name,
            'computer_place' => $this->origin,
            'computer_cost' => $this->price,
        ];
    }
}
