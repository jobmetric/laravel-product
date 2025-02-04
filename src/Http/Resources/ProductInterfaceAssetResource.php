<?php

namespace JobMetric\Product\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Extension\Http\Resources\PluginResource;
use JobMetric\Extension\Models\Plugin;
use JobMetric\Product\Models\Product;

/**
 * @property int $id
 * @property int $plugin_id
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
 * @property-read Plugin $plugin
 * @property-read Product $simpleProduct
 * @property-read Product[] $products
 * @property-read int|null $products_count
 * @property-read Product[] $withoutSimpleProducts
 * @property-read int|null $without_simple_products_count
 * @property-read mixed $translations
 */
class ProductInterfaceAssetResource extends JsonResource
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
            'plugin_id' => $this->plugin_id,
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

            'plugin' => $this->whenLoaded('plugin', function () {
                return PluginResource::make($this->plugin);
            }),

            'simpleProduct' => $this->whenLoaded('simpleProduct', function () {
                return ProductResource::make($this->simpleProduct);
            }),

            'products' => $this->whenLoaded('products', function () {
                return ProductResource::collection($this->products);
            }),

            'withoutSimpleProducts' => $this->whenLoaded('withoutSimpleProducts', function () {
                return ProductResource::collection($this->withoutSimpleProducts);
            }),
        ];
    }
}
