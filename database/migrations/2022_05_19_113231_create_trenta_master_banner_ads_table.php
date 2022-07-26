<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaMasterBannerAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_master_banner_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('trenta_master_countries');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('trenta_master_states');
            $table->string('cities')->nullable();
            $table->unsignedBigInteger('main_category_id')->nullable();
            $table->foreign('main_category_id')->references('id')->on('trenta_master_main_shopping_category');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('trenta_master_submain_shopping_category');
            $table->bigInteger('product_id');
            $table->string('city_areas')->nullable();
            $table->string('fromdate')->nullable();
            $table->string('todate')->nullable();
            $table->integer('ad_sequence_number')->nullable();
            $table->string('ad_url')->nullable();
            $table->string('banner_image_path')->nullable();
            $table->string('banner_image_name')->nullable();
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
        Schema::dropIfExists('trenta_master_banner_ads');
    }
}
