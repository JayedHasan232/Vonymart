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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('tracking_id')->nullable()->comment('Human readable');

            $table->string('total_price');
            $table->float('total_quantity');

            $table->string('order_status')->default(1);
            $table->string('payment_status')->default(0)->comment('0: Unpaid, 1: Paid');

            $table->string('payment_currency')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_transaction_id')->nullable();

            // Charges
            $table->float('packaging_charge')->nullable();
            $table->float('shipping_charge')->nullable();
            $table->float('service_charge')->nullable(); // Ex: payment gateway charge
            $table->float('tax')->nullable();

            // Address
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alt_phone')->nullable();

            $table->text('billing_address')->nullable();
            $table->text('shipping_address')->nullable();
            $table->text('shipping_alt_address')->nullable();
            $table->text('note')->nullable();

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
        Schema::dropIfExists('orders');
    }
};
