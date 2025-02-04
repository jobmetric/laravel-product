<?php

namespace JobMetric\Product\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Models\Complimentary;

/**
 * @extends Factory<Complimentary>
 */
class ComplimentaryFactory extends Factory
{
    protected $model = Complimentary::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => null,
            'product_quantity' => $this->faker->randomNumber(),
            'complimentary_id' => null,
            'complimentary_quantity' => $this->faker->randomNumber(),
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
     * set product_quantity
     *
     * @param float $product_quantity
     *
     * @return static
     */
    public function setProductQuantity(float $product_quantity): static
    {
        return $this->state(fn(array $attributes) => [
            'product_quantity' => $product_quantity,
        ]);
    }

    /**
     * set complimentary_id
     *
     * @param int $complimentary_id
     *
     * @return static
     */
    public function setComplimentaryId(int $complimentary_id): static
    {
        return $this->state(fn(array $attributes) => [
            'complimentary_id' => $complimentary_id,
        ]);
    }

    /**
     * set complimentary_quantity
     *
     * @param float $complimentary_quantity
     *
     * @return static
     */
    public function setComplimentaryQuantity(float $complimentary_quantity): static
    {
        return $this->state(fn(array $attributes) => [
            'complimentary_quantity' => $complimentary_quantity,
        ]);
    }
}
