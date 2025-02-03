<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JobMetric\Product\Enums\ProductPlanTypeEnum;
use JobMetric\Product\Enums\ProductPricingTypeEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('product.tables.product_plan'), function (Blueprint $table) {
            $table->id();

            $table->boolean('is_global')->default(false)->index();
            /**
             * is_global if false, fill planable_id and planable_type
             */

            $table->nullableMorphs('planable');

            $table->string('type')->default(ProductPlanTypeEnum::AMOUNT())->index();
            /**
             * value: amount, percent
             * use: @extends ProductPlanTypeEnum
             */

            $table->enum('sign', [1, -1])->default(1);

            $table->decimal('amount', 15, 3)->default(0)->index();

            $table->foreignId('currency_id')->index()->constrained(config('unit.tables.unit'))->cascadeOnUpdate()->cascadeOnDelete();

            $table->dateTime('from_at')->nullable()->index();
            $table->dateTime('to_at')->nullable()->index();

            $table->timestamps();

            $table->index([
                'from_at',
                'to_at',
            ], 'FROM_TO_AT_PRICING_PLAN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('product.tables.product_plan'));
    }
};
