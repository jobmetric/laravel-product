<?php

namespace JobMetric\Product\Http\Resources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Attribute\Http\Resources\GalleryVariationResource;
use JobMetric\Attribute\Models\GalleryVariation;
use JobMetric\Unit\Http\Resources\UnitResource;
use JobMetric\Unit\Models\Unit;

/**
 * @property int $id
 * @property int $product_interfaceable_id
 * @property string $product_interfaceable_type
 * @property int $gallery_variation_id
 * @property string $type
 * @property string $sku
 * @property int $minimum
 * @property int $maximum
 * @property float $warning_quantity
 * @property int $weight_sign
 * @property float $weight
 * @property int $weight_unit_id
 * @property bool $is_lock_pricing_plan
 * @property int $unit_type_id
 * @property bool $status
 * @property bool $is_hide
 * @property bool $is_ladder
 * @property Carbon $ladder_at
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property mixed $product_interfaceable_resource
 *
 * @property-read Model $productInterfaceable
 * @property-read GalleryVariation $galleryVariation
 * @property-read Unit $weightUnit
 * @property-read Unit $unitType
 */
class ProductResource extends JsonResource
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
            'product_interfaceable_id' => $this->product_interfaceable_id,
            'product_interfaceable_type' => $this->product_interfaceable_type,
            'gallery_variation_id' => $this->gallery_variation_id,
            'type' => $this->type,
            'sku' => $this->sku,
            'minimum' => $this->minimum,
            'maximum' => $this->maximum,
            'warning_quantity' => $this->warning_quantity,
            'weight_sign' => $this->weight_sign,
            'weight' => $this->weight,
            'weight_unit_id' => $this->weight_unit_id,
            'is_lock_pricing_plan' => $this->is_lock_pricing_plan,
            'unit_type_id' => $this->unit_type_id,
            'status' => $this->status,
            'is_hide' => $this->is_hide,
            'is_ladder' => $this->is_ladder,
            'ladder_at' => Carbon::make($this->ladder_at)->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::make($this->deleted_at)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'interfaceable' => $this?->product_interfaceable_resource,

            'galleryVariation' => $this->whenLoaded('galleryVariation', function () {
                return GalleryVariationResource::make($this->galleryVariation);
            }),

            'weightUnit' => $this->whenLoaded('weightUnit', function () {
                return UnitResource::make($this->weightUnit);
            }),

            'unitType' => $this->whenLoaded('unitType', function () {
                return UnitResource::make($this->unitType);
            }),
        ];
    }
}
