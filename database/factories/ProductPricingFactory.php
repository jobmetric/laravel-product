<?php

namespace JobMetric\Product\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Enums\ProductPricingTypeEnum;
use JobMetric\Product\Models\ProductPricing;

/**
 * @extends Factory<ProductPricing>
 */
class ProductPricingFactory extends Factory
{
    protected $model = ProductPricing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => null,
            'type' => $this->faker->randomElement(ProductPricingTypeEnum::values()),
            'amount' => $this->faker->randomNumber(),
            'currency_id' => null,
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
     * set type
     *
     * @param string $type
     *
     * @return static
     */
    public function setType(string $type): static
    {
        return $this->state(fn(array $attributes) => [
            'type' => $type,
        ]);
    }

    /**
     * set amount
     *
     * @param float $amount
     *
     * @return static
     */
    public function setAmount(float $amount): static
    {
        return $this->state(fn(array $attributes) => [
            'amount' => $amount,
        ]);
    }

    /**
     * set currency_id
     *
     * @param int $currency_id
     *
     * @return static
     */
    public function setCurrencyId(int $currency_id): static
    {
        return $this->state(fn(array $attributes) => [
            'currency_id' => $currency_id,
        ]);
    }
}
