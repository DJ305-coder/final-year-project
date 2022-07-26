<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaShoppingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_shopping_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_category_id');
            $table->foreign('main_category_id')->references('id')->on('trenta_master_main_shopping_category');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('trenta_master_submain_shopping_category');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('trenta_master_brand');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('product_name')->nullable();
            $table->decimal('product_mrp', $precision = 8, $scale = 2)->nullable();
            $table->decimal('product_special_price', $precision = 8, $scale = 2)->nullable();
            $table->float('product_discount', 8, 2)->nullable();
            $table->mediumText('product_description')->nullable();
            $table->mediumText('search_keywords')->nullable();
            $table->string('feature_image_path')->nullable();
            $table->string('feature_image_name')->nullable();
            $table->string('size_chart')->nullable();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
            $table->enum('status',['active','delete','inactive'])->default('active');
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
        Schema::dropIfExists('trenta_shopping_products');
    }
}
