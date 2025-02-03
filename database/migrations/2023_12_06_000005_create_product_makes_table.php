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
        Schema::create(config('product.tables.product_make'), function (Blueprint $table) {
            $table->foreignId('product_id')->index()->constrained(config('product.tables.product'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('child_id')->index()->constrained(config('product.tables.product'))->cascadeOnUpdate()->cascadeOnDelete();

            $table->decimal('quantity', 15, 3);

            $table->unique([
                'product_id',
                'child_id'
            ], 'PRODUCT_MAKE_UNIQUE');

            $table->index([
                'product_id',
                'child_id'
            ], 'PRODUCT_MAKE_INDEX');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('product.tables.product_make'));
    }
};
