<?php

namespace JobMetric\Product\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Product\Models\Product;

/**
 * @property int $product_id
 * @property int $child_id
 * @property float $quantity
 *
 * @property-read Product $product
 * @property-read Product $child
 */
class ProductMakeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
            'child_id' => $this->child_id,
            'quantity' => $this->quantity,
        ];
    }
}
