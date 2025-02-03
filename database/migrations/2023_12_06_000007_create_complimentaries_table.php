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
        /**
         * product quantity | complimentary quantity
         * -----------------------------------------
         * 2   bag x        | 1 bag y
         * 3.2 gold         | 0.1
         */
        Schema::create(config('product.tables.complimentary'), function (Blueprint $table) {
            $table->id();

            // base product
            $table->foreignId('product_id')->index()->constrained(config('product.tables.products'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('product_quantity', 15, 8);

            // target complimentary
            $table->foreignId('complimentary_id')->index()->constrained(config('product.tables.products'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('complimentary_quantity', 15, 8)->default(1);

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
        Schema::dropIfExists(config('product.tables.complimentary'));
    }
};
