<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'id' => $this->id,
            'products' => $this->products,
            'sum' => (string)$this->sum,
            'date' => date_format($this->created_at, "d.m.Y"),
            'track_number' => $this->track_number
        ];
    }
}
