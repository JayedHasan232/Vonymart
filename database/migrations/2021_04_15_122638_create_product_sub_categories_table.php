<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('privacy')->default(1);
            $table->string('title');
            $table->string('url');
            $table->text('overview')->nullable();
            
            $table->integer('category_id');

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            
            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();
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
        Schema::dropIfExists('product_sub_categories');
    }
}
