<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaSewingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_sewing_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_category_id')->nullable();
            $table->foreign('main_category_id')->references('id')->on('trenta_sewing_main_category');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('trenta_sewing_sub_category');
            $table->string('product_name')->nullable();
            $table->decimal('stiching_price', $precision = 8, $scale = 2)->nullable();
            $table->decimal('offer_price', $precision = 8, $scale = 2)->nullable();
            $table->mediumText('product_description')->nullable();
            $table->string('search_keywords')->nullable();
            $table->string('feature_image_path')->nullable();
            $table->string('feature_image_name')->nullable();
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
        Schema::dropIfExists('trenta_sewing_products');
    }
}
