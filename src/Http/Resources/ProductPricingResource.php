<?php

namespace JobMetric\Product\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Product\Models\Product;
use JobMetric\Unit\Models\Unit;

/**
 * @property int $id
 * @property int $product_id
 * @property string $type
 * @property float $amount
 * @property int $currency_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Product $product
 * @property-read Unit $currency
 */
class ProductPricingResource extends JsonResource
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
            'type' => $this->type,
            'amount' => $this->amount,
            'currency_id' => $this->currency_id,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
