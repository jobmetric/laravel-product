<?php

namespace JobMetric\Product\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Enums\ProductTypeEnum;
use JobMetric\Product\Models\Product;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_interfaceable_id' => null,
            'product_interfaceable_type' => null,
            'gallery_variation_id' => null,
            'type' => $this->faker->randomElement(ProductTypeEnum::values()),
            'sku' => $this->faker->word,
            'minimum' => $this->faker->randomNumber(),
            'maximum' => $this->faker->randomNumber(),
            'warning_quantity' => $this->faker->randomFloat(),
            'weight_sign' => $this->faker->randomElement([1, -1]),
            'weight' => $this->faker->randomFloat(),
            'weight_unit_id' => null,
            'is_lock_pricing_plan' => $this->faker->boolean,
            'unit_type_id' => null,
            'status' => $this->faker->boolean,
            'is_hide' => $this->faker->boolean,
            'is_ladder' => $this->faker->boolean,
            'ladder_at' => $this->faker->dateTime,
        ];
    }

    /**
     * set product_interfaceable
     *
     * @param string $product_interfaceable_type
     * @param int $product_interfaceable_id
     *
     * @return static
     */
    public function setProductInterfaceable(string $product_interfaceable_type, int $product_interfaceable_id): static
    {
        return $this->state(fn(array $attributes) => [
            'product_interfaceable_id' => $product_interfaceable_id,
            'product_interfaceable_type' => $product_interfaceable_type
        ]);
    }

    /**
     * set gallery_variation_id
     *
     * @param int $gallery_variation_id
     *
     * @return static
     */
    public function setGalleryVariationId(int $gallery_variation_id): static
    {
        return $this->state(fn(array $attributes) => [
            'gallery_variation_id' => $gallery_variation_id
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
            'type' => $type
        ]);
    }

    /**
     * set sku
     *
     * @param string $sku
     *
     * @return static
     */
    public function setSku(string $sku): static
    {
        return $this->state(fn(array $attributes) => [
            'sku' => $sku
        ]);
    }

    /**
     * set minimum
     *
     * @param int $minimum
     *
     * @return static
     */
    public function setMinimum(int $minimum): static
    {
        return $this->state(fn(array $attributes) => [
            'minimum' => $minimum
        ]);
    }

    /**
     * set maximum
     *
     * @param int $maximum
     *
     * @return static
     */
    public function setMaximum(int $maximum): static
    {
        return $this->state(fn(array $attributes) => [
            'maximum' => $maximum
        ]);
    }

    /**
     * set warning_quantity
     *
     * @param float $warning_quantity
     *
     * @return static
     */
    public function setWarningQuantity(float $warning_quantity): static
    {
        return $this->state(fn(array $attributes) => [
            'warning_quantity' => $warning_quantity
        ]);
    }

    /**
     * set weight_sign
     *
     * @param int $weight_sign
     *
     * @return static
     */
    public function setWeightSign(int $weight_sign): static
    {
        return $this->state(fn(array $attributes) => [
            'weight_sign' => $weight_sign
        ]);
    }

    /**
     * set weight
     *
     * @param float $weight
     *
     * @return static
     */
    public function setWeight(float $weight): static
    {
        return $this->state(fn(array $attributes) => [
            'weight' => $weight
        ]);
    }

    /**
     * set weight_unit_id
     *
     * @param int $weight_unit_id
     *
     * @return static
     */
    public function setWeightUnitId(int $weight_unit_id): static
    {
        return $this->state(fn(array $attributes) => [
            'weight_unit_id' => $weight_unit_id
        ]);
    }

    /**
     * set is_lock_pricing_plan
     *
     * @param bool $is_lock_pricing_plan
     *
     * @return static
     */
    public function setIsLockPricingPlan(bool $is_lock_pricing_plan): static
    {
        return $this->state(fn(array $attributes) => [
            'is_lock_pricing_plan' => $is_lock_pricing_plan
        ]);
    }

    /**
     * set unit_type_id
     *
     * @param int $unit_type_id
     *
     * @return static
     */
    public function setUnitTypeId(int $unit_type_id): static
    {
        return $this->state(fn(array $attributes) => [
            'unit_type_id' => $unit_type_id
        ]);
    }

    /**
     * set status
     *
     * @param bool $status
     *
     * @return static
     */
    public function setStatus(bool $status): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => $status
        ]);
    }

    /**
     * set is_hide
     *
     * @param bool $is_hide
     *
     * @return static
     */
    public function setIsHide(bool $is_hide): static
    {
        return $this->state(fn(array $attributes) => [
            'is_hide' => $is_hide
        ]);
    }

    /**
     * set is_ladder
     *
     * @param bool $is_ladder
     *
     * @return static
     */
    public function setIsLadder(bool $is_ladder): static
    {
        return $this->state(fn(array $attributes) => [
            'is_ladder' => $is_ladder
        ]);
    }

    /**
     * set ladder_at
     *
     * @param Carbon $ladder_at
     *
     * @return static
     */
    public function setLadderAt(Carbon $ladder_at): static
    {
        return $this->state(fn(array $attributes) => [
            'ladder_at' => $ladder_at
        ]);
    }
}
