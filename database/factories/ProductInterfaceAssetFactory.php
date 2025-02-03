<?php

namespace JobMetric\Product\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Product\Models\ProductInterfaceAsset;

/**
 * @extends Factory<ProductInterfaceAsset>
 */
class ProductInterfaceAssetFactory extends Factory
{
    protected $model = ProductInterfaceAsset::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plugin_id' => null,
            'tax_class_id' => null,
            'has_tax' => $this->faker->boolean,
            'hits' => $this->faker->randomNumber(),
            'status' => $this->faker->boolean,
            'max_discount' => $this->faker->randomFloat(2, 0, 100),
            'password' => null,
            'published_at' => $this->faker->dateTime,
        ];
    }

    /**
     * set plugin_id
     *
     * @param int $plugin_id
     *
     * @return static
     */
    public function setPluginId(int $plugin_id): static
    {
        return $this->state(fn(array $attributes) => [
            'plugin_id' => $plugin_id
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
