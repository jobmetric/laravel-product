<?php

namespace JobMetric\Product\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Enums\ProductTypeEnum;
use JobMetric\Product\Models\ProductMake;

/**
 * @extends Factory<ProductMake>
 */
class ProductMakeFactory extends Factory
{
    protected $model = ProductMake::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => null,
            'child_id' => null,
            'quantity' => $this->faker->randomNumber(),
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
     * set child_id
     *
     * @param int $child_id
     *
     * @return static
     */
    public function setChildId(int $child_id): static
    {
        return $this->state(fn(array $attributes) => [
            'child_id' => $child_id,
        ]);
    }

    /**
     * set quantity
     *
     * @param float $quantity
     *
     * @return static
     */
    public function setQuantity(float $quantity): static
    {
        return $this->state(fn(array $attributes) => [
            'quantity' => $quantity,
        ]);
    }
}
