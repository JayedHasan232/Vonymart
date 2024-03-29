<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->boolean('privacy')->default(true);
            $table->bigInteger('view_count')->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock_count')->nullable();
            $table->boolean('show_in_trending')->default(true);
            $table->float('discount_rate')->nullable();

            $table->string('title');
            $table->string('url');
            $table->integer('price')->nullable();

            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();

            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->text('image')->nullable();
            $table->text('image_medium')->nullable();
            $table->text('image_small')->nullable();

            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
