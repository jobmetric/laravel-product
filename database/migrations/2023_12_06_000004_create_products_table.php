<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use JobMetric\Product\Enums\ProductTypeEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('product.tables.product'), function (Blueprint $table) {
            $table->id();

            $table->morphs('product_interfaceable', 'product_interfaceable_index');
            /**
             * The product_interfaceable field is used to set the product interface for the product.
             */

            $table->foreignId('gallery_variation_id')->nullable()->index()->constrained(config('attribute.tables.gallery_variation'))->nullOnDelete()->cascadeOnUpdate();

            $table->string('type')->default(ProductTypeEnum::SIMPLE());
            /**
             * value: simple, make, attribute
             * use: @extends ProductTypeEnum
             */

            $table->string('sku')->nullable()->index();

            $table->smallInteger('minimum')->default(0);
            $table->smallInteger('maximum')->default(0);

            $table->decimal('warning_quantity', 15, 3)->default(0)->index();
            /**
             * Out of stock alert to management
             */

            $table->tinyInteger('weight_sign')->default(1);
            $table->decimal('weight', 15, 3)->nullable();
            $table->foreignId('weight_unit_id')->nullable()->constrained(config('unit.tables.unit'))->nullOnDelete()->cascadeOnUpdate();

            $table->boolean('is_lock_pricing_plan')->default(false);
            /**
             * If this option is active, pricing plan calculations are not used and this product is priced directly
             */

            $table->foreignId('unit_type')->nullable()->index()->constrained(config('unit.tables.unit'))->nullOnDelete()->cascadeOnUpdate();

            $table->boolean('status')->default(true)->index();
            /**
             * enable or disable product for show in list and single.
             */

            $table->boolean('is_hide')->default(false)->index();
            /**
             * If this option is active, the product will not be displayed in the list.
             */

            $table->boolean('is_ladder')->default(false)->index();
            $table->dateTime('ladder_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable()->index();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('product.tables.product'));
    }
};
