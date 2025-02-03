<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JobMetric\Product\Enums\ProductPricingTypeEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('product.tables.product_pricing'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->index()->constrained(config('product.tables.product'))->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('type')->default(ProductPricingTypeEnum::NORMAL())->index();
            /**
             * value: normal, special
             * use: @extends ProductPricingTypeEnum
             */

            $table->decimal('amount', 15, 8)->default(0)->index();

            $table->dateTime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('product.tables.product_pricing'));
    }
};
