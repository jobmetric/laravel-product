<?php

namespace JobMetric\Product\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Enums\ProductPlanTypeEnum;
use JobMetric\Product\Models\PricingPlan;

/**
 * @extends Factory<PricingPlan>
 */
class PricingPlanFactory extends Factory
{
    protected $model = PricingPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_global' => $this->faker->boolean,
            'planable_type' => null,
            'planable_id' => null,
            'type' => $this->faker->randomElement(ProductPlanTypeEnum::values()),
            'sign' => $this->faker->randomElement([1, -1]),
            'amount' => $this->faker->randomFloat(),
            'currency_id' => null,
            'from_at' => $this->faker->dateTime,
            'to_at' => $this->faker->dateTime,
        ];
    }

    /**
     * set is_global
     *
     * @param bool $is_global
     *
     * @return static
     */
    public function setIsGlobal(bool $is_global): static
    {
        return $this->state(fn(array $attributes) => [
            'is_global' => $is_global,
        ]);
    }

    /**
     * set planable
     *
     * @param string $planable_type
     * @param int $planable_id
     *
     * @return static
     */
    public function setPlanable(string $planable_type, int $planable_id): static
    {
        return $this->state(fn(array $attributes) => [
            'planable_type' => $planable_type,
            'planable_id' => $planable_id,
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
     * set sign
     *
     * @param int $sign
     *
     * @return static
     */
    public function setSign(int $sign): static
    {
        return $this->state(fn(array $attributes) => [
            'sign' => $sign,
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

    /**
     * set from_at
     *
     * @param Carbon $from_at
     *
     * @return static
     */
    public function setFromAt(Carbon $from_at): static
    {
        return $this->state(fn(array $attributes) => [
            'from_at' => $from_at,
        ]);
    }

    /**
     * set to_at
     *
     * @param Carbon $to_at
     *
     * @return static
     */
    public function setToAt(Carbon $to_at): static
    {
        return $this->state(fn(array $attributes) => [
            'to_at' => $to_at,
        ]);
    }
}
