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
        Schema::create(config('product.tables.product_interface_service'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('plugin_id')->index()->constrained(config('extension.tables.plugin'))->cascadeOnUpdate()->restrictOnDelete();
            /**
             * The plugin_id field is used to set the plugin for the product.
             */

            $table->foreignId('taxonomy_id')->index()->constrained(config('taxonomy.tables.taxonomy'))->cascadeOnUpdate()->restrictOnDelete();
            /**
             * The taxonomy_id field is used to set the taxonomy for the product.
             */

            $table->foreignId('brand_id')->nullable()->index()->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId('tax_class_id')->nullable()->index()->constrained(config('unit.tables.unit'))->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean('has_tax')->default(false)->index();

            $table->unsignedBigInteger('hits')->default(0)->index();
            /**
             * The hits field is used to determine the number of visits to the product.
             */

            $table->boolean('status')->default(true)->index();
            /**
             * enable or disable product interface for show in list and single.
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
        Schema::dropIfExists(config('product.tables.product_interface_service'));
    }
};
