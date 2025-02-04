<?php

namespace JobMetric\Product\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Brand\Models\Brand;
use JobMetric\Product\Models\Product;
use JobMetric\Taxonomy\Models\Taxonomy;

/**
 * @property int $id
 * @property int $taxonomy_id
 * @property int $brand_id
 * @property int $tax_class_id
 * @property bool $has_tax
 * @property int $hits
 * @property bool $status
 * @property float $max_discount
 * @property string $password
 * @property Carbon $published_at
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Taxonomy $taxonomy
 * @property-read Brand $brand
 * @property-read Product $simpleProduct
 * @property-read Product[] $products
 * @property-read int|null $products_count
 * @property-read Product[] $withoutSimpleProducts
 * @property-read int|null $without_simple_products_count
 * @property-read mixed $translations
 */
class ProductInterfaceDigitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        global $translationLocale;

        return [
            'id' => $this->id,
            'taxonomy_id' => $this->taxonomy_id,
            'brand_id' => $this->brand_id,
            'tax_class_id' => $this->tax_class_id,
            'has_tax' => $this->has_tax,
            'hits' => $this->hits,
            'status' => $this->status,
            'max_discount' => $this->max_discount,
            'published_at' => Carbon::make($this->published_at)->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::make($this->deleted_at)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'translations' => translationResourceData($this->translations, $translationLocale),
        ];
    }
}
