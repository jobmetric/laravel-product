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
        Schema::create(config('product.tables.product_interface_physical'), function (Blueprint $table) {
            $table->id();

            $table->string('model')->nullable();
            /**
             * The model field is used to set the model for the product.
             */

            $table->foreignId('taxonomy_id')->index()->constrained(config('taxonomy.tables.taxonomy'))->cascadeOnUpdate()->restrictOnDelete();
            /**
             * The taxonomy_id field is used to set the taxonomy for the product.
             */

            $table->foreignId('brand_id')->nullable()->index()->constrained()->restrictOnDelete();

            $table->foreignId('tax_class_id')->nullable()->index()->constrained(config('unit.tables.unit'))->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean('has_tax')->default(false)->index();

            $table->boolean('has_fmcg')->default(false)->index();
            /**
             * If the product is a fast-moving consumer goods, we must activate this field.
             */

            $table->boolean('subtract')->default(true)->index();
            /**
             * If we want to reduce the product inventory after each sale, we must activate this field.
             */

            $table->decimal('weight', 15, 8)->nullable();
            $table->foreignId('weight_unit_id')->nullable()->constrained(config('unit.tables.unit'))->cascadeOnUpdate()->restrictOnDelete();

            $table->decimal('length', 15, 8)->nullable();
            $table->decimal('width', 15, 8)->nullable();
            $table->decimal('height', 15, 8)->nullable();
            $table->foreignId('length_unit_id')->nullable()->constrained(config('unit.tables.unit'))->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('hits')->default(0)->index();
            /**
             * The hits field is used to determine the number of visits to the product.
             */

            $table->boolean('status')->default(true)->index();
            /**
             * enable or disable product interface for show in list and single.
             */

            $table->boolean('stock_status')->default(true);
            /**
             * If we want to reset the product inventory to zero manually, we disable this part.
             */

            $table->boolean('need_stock_confirm')->default(false);
            /**
             * If you want to ensure that the goods are available in the warehouse during the
             * sale, we must activate this field, otherwise, the warehouse will not be
             * checked and the order will be registered by the customer and wait
             * for the payment link to be sent by the admin.
             */

            $table->decimal('max_discount', 15, 8)->default(0)->index();
            /**
             * The max_discount field is used to determine the maximum discount that can be applied to the product.
             */

            $table->string('password')->nullable();
            /**
             * The password field is used to set a password for the product.
             */

            $table->dateTime('published_at')->nullable()->index();
            /**
             * The published_at field is used to determine the date and time the product was published or will be published.
             */

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
        Schema::dropIfExists(config('product.tables.product_interface_physical'));
    }
};
