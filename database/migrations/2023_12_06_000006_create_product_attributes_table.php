<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('product.tables.product_attribute'), function (Blueprint $table) {
            $table->foreignId('product_id')->index()->constrained(config('product.tables.product'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('attribute_relation_id')->index()->constrained(config('attribute.tables.attribute_relation'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('attribute_value_id')->index()->constrained(config('attribute.tables.attribute_value'))->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique([
                'product_id',
                'attribute_relation_id'
            ], 'PRODUCT_ATTRIBUTE_UNIQUE');

            $table->index([
                'product_id',
                'attribute_relation_id'
            ], 'PRODUCT_ATTRIBUTE_INDEX');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('product.tables.product_attribute'));
    }
};
