<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'initial_quantity' => $this->initial_quantity,
            'current_quantity' => $this->current_quantity,
            'created_at' => $this->created_at
        ];
    }
}
