<?php

namespace JobMetric\Product\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Models\ProductInterfacePhysical;

/**
 * @extends Factory<ProductInterfacePhysical>
 */
class ProductInterfacePhysicalFactory extends Factory
{
    protected $model = ProductInterfacePhysical::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->word,
            'taxonomy_id' => null,
            'brand_id' => null,
            'tax_class_id' => null,
            'has_tax' => $this->faker->boolean,
            'has_fmcg' => $this->faker->boolean,
            'subtract' => $this->faker->boolean,
            'weight' => $this->faker->randomFloat(2, 0, 100),
            'weight_unit_id' => null,
            'length' => $this->faker->randomFloat(2, 0, 100),
            'width' => $this->faker->randomFloat(2, 0, 100),
            'height' => $this->faker->randomFloat(2, 0, 100),
            'length_unit_id' => null,
            'hits' => $this->faker->randomNumber(),
            'status' => $this->faker->boolean,
            'stock_status' => $this->faker->boolean,
            'need_stock_confirm' => $this->faker->boolean,
            'max_discount' => $this->faker->randomFloat(2, 0, 100),
            'password' => null,
            'published_at' => $this->faker->dateTime,
        ];
    }

    /**
     * set model
     *
     * @param string $model
     *
     * @return static
     */
    public function setModel(string $model): static
    {
        return $this->state(fn(array $attributes) => [
            'model' => $model
        ]);
    }

    /**
     * set taxonomy_id
     *
     * @param int $taxonomy_id
     *
     * @return static
     */
    public function setTaxonomyId(int $taxonomy_id): static
    {
        return $this->state(fn(array $attributes) => [
            'taxonomy_id' => $taxonomy_id
        ]);
    }

    /**
     * set brand_id
     *
     * @param int $brand_id
     *
     * @return static
     */
    public function setBrandId(int $brand_id): static
    {
        return $this->state(fn(array $attributes) => [
            'brand_id' => $brand_id
        ]);
    }

    /**
     * set tax_class_id
     *
     * @param int $tax_class_id
     *
     * @return static
     */
    public function setTaxClassId(int $tax_class_id): static
    {
        return $this->state(fn(array $attributes) => [
            'tax_class_id' => $tax_class_id
        ]);
    }

    /**
     * set has_tax
     *
     * @param bool $has_tax
     *
     * @return static
     */
    public function setHasTax(bool $has_tax): static
    {
        return $this->state(fn(array $attributes) => [
            'has_tax' => $has_tax
        ]);
    }

    /**
     * set has_fmcg
     *
     * @param bool $has_fmcg
     *
     * @return static
     */
    public function setHasFmcg(bool $has_fmcg): static
    {
        return $this->state(fn(array $attributes) => [
            'has_fmcg' => $has_fmcg
        ]);
    }

    /**
     * set subtract
     *
     * @param bool $subtract
     *
     * @return static
     */
    public function setSubtract(bool $subtract): static
    {
        return $this->state(fn(array $attributes) => [
            'subtract' => $subtract
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
     * set length
     *
     * @param float $length
     *
     * @return static
     */
    public function setLength(float $length): static
    {
        return $this->state(fn(array $attributes) => [
            'length' => $length
        ]);
    }

    /**
     * set width
     *
     * @param float $width
     *
     * @return static
     */
    public function setWidth(float $width): static
    {
        return $this->state(fn(array $attributes) => [
            'width' => $width
        ]);
    }

    /**
     * set height
     *
     * @param float $height
     *
     * @return static
     */
    public function setHeight(float $height): static
    {
        return $this->state(fn(array $attributes) => [
            'height' => $height
        ]);
    }

    /**
     * set length_unit_id
     *
     * @param int $length_unit_id
     *
     * @return static
     */
    public function setLengthUnitId(int $length_unit_id): static
    {
        return $this->state(fn(array $attributes) => [
            'length_unit_id' => $length_unit_id
        ]);
    }

    /**
     * set hits
     *
     * @param int $hits
     *
     * @return static
     */
    public function setHits(int $hits): static
    {
        return $this->state(fn(array $attributes) => [
            'hits' => $hits
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
     * set stock_status
     *
     * @param bool $stock_status
     *
     * @return static
     */
    public function setStockStatus(bool $stock_status): static
    {
        return $this->state(fn(array $attributes) => [
            'stock_status' => $stock_status
        ]);
    }

    /**
     * set need_stock_confirm
     *
     * @param bool $need_stock_confirm
     *
     * @return static
     */
    public function setNeedStockConfirm(bool $need_stock_confirm): static
    {
        return $this->state(fn(array $attributes) => [
            'need_stock_confirm' => $need_stock_confirm
        ]);
    }

    /**
     * set max_discount
     *
     * @param float $max_discount
     *
     * @return static
     */
    public function setMaxDiscount(float $max_discount): static
    {
        return $this->state(fn(array $attributes) => [
            'max_discount' => $max_discount
        ]);
    }

    /**
     * set password
     *
     * @param string $password
     *
     * @return static
     */
    public function setPassword(string $password): static
    {
        return $this->state(fn(array $attributes) => [
            'password' => $password
        ]);
    }

    /**
     * set published_at
     *
     * @param Carbon|string $published_at
     *
     * @return static
     */
    public function setPublishedAt(Carbon|string $published_at): static
    {
        return $this->state(fn(array $attributes) => [
            'published_at' => $published_at
        ]);
    }
}
