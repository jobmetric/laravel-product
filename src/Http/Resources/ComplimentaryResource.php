<?php

namespace JobMetric\Product\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Product\Models\Product;

/**
 * @property int $id
 * @property int $product_id
 * @property float $product_quantity
 * @property int $complimentary_id
 * @property float $complimentary_quantity
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Product $product
 * @property-read Product $complimentary
 */
class ComplimentaryResource extends JsonResource
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
            'product_id' => $this->product_id,
            'product_quantity' => $this->product_quantity,
            'complimentary_id' => $this->complimentary_id,
            'complimentary_quantity' => $this->complimentary_quantity,
            'deleted_at' => Carbon::make($this->deleted_at)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'product' => $this->whenLoaded('product', function () {
                return ProductResource::make($this->product);
            }),

            'complimentary' => $this->whenLoaded('complimentary', function () {
                return ProductResource::make($this->complimentary);
            }),
        ];
    }
}
