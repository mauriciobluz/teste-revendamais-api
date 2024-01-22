<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostalCodeResource extends JsonResource
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
            'postal_code' => $this->postal_code,
            'street_name' => $this->street_name
        ];
    }

    public function toResponse($request)
    {
        return $this->toArray($request);
    }
}
