<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->foreignId('product_variation_id')->nullable();

            $table->float('quantity');
            $table->float('unit_price');
            $table->float('total_price');

            // Fees
            $table->float('tax')->default(0);
            $table->float('packaging_fee')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
};
