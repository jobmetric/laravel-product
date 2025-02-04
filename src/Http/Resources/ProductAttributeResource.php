<?php

namespace JobMetric\Product\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Attribute\Http\Resources\AttributeRelationResource;
use JobMetric\Attribute\Http\Resources\AttributeValueResource;
use JobMetric\Attribute\Models\AttributeRelation;
use JobMetric\Attribute\Models\AttributeValue;
use JobMetric\Product\Models\Product;

/**
 * @property int $product_id
 * @property int $attribute_relation_id
 * @property int $attribute_value_id
 *
 * @property-read Product $product
 * @property-read AttributeRelation $attributeRelation
 * @property-read AttributeValue $attributeValue
 */
class ProductAttributeResource extends JsonResource
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
            'attribute_relation_id' => $this->attribute_relation_id,
            'attribute_value_id' => $this->attribute_value_id,

            'product' => $this->whenLoaded('product', function () {
                return ProductResource::make($this->product);
            }),

            'attributeRelation' => $this->whenLoaded('attributeRelation', function () {
                return AttributeRelationResource::make($this->attributeRelation);
            }),

            'attributeValue' => $this->whenLoaded('attributeValue', function () {
                return AttributeValueResource::make($this->attributeValue);
            }),
        ];
    }
}
