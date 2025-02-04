<?php

namespace JobMetric\Product\Http\Resources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property bool $is_global
 * @property string $planable_type
 * @property int $planable_id
 * @property string $type
 * @property int $sign
 * @property float $amount
 * @property int $currency_id
 * @property Carbon $from_at
 * @property Carbon $to_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Model $planable
 */
class PricingPlanResource extends JsonResource
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
            'is_global' => $this->is_global,
            'planable_type' => $this->planable_type,
            'planable_id' => $this->planable_id,
            'type' => $this->type,
            'sign' => $this->sign,
            'amount' => $this->amount,
            'currency_id' => $this->currency_id,
            'from_at' => Carbon::make($this->from_at)->format('Y-m-d H:i:s'),
            'to_at' => Carbon::make($this->to_at)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
