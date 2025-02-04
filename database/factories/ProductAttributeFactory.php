<?php

namespace JobMetric\Product\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Models\ProductAttribute;

/**
 * @extends Factory<ProductAttribute>
 */
class ProductAttributeFactory extends Factory
{
    protected $model = ProductAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => null,
            'attribute_relation_id' => null,
            'attribute_value_id' => null,
        ];
    }

    /**
     * set product_id
     *
     * @param int $product_id
     *
     * @return static
     */
    public function setProductId(int $product_id): static
    {
        return $this->state(fn(array $attributes) => [
            'product_id' => $product_id,
        ]);
    }

    /**
     * set attribute_relation_id
     *
     * @param int $attribute_relation_id
     *
     * @return static
     */
    public function setAttributeRelationId(int $attribute_relation_id): static
    {
        return $this->state(fn(array $attributes) => [
            'attribute_relation_id' => $attribute_relation_id,
        ]);
    }

    /**
     * set attribute_value_id
     *
     * @param int $attribute_value_id
     *
     * @return static
     */
    public function setAttributeValueId(int $attribute_value_id): static
    {
        return $this->state(fn(array $attributes) => [
            'attribute_value_id' => $attribute_value_id,
        ]);
    }
}
