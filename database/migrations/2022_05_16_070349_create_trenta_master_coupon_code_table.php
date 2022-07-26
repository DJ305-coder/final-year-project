<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaMasterCouponCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_master_coupon_code', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->uppercase();
            $table->bigInteger('discount_percentage')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->decimal('min_order_amount',10,2)->nullable();
            $table->decimal('discount_max_amount',10,2)->nullable();
            $table->bigInteger('no_of_users')->nullable();
            $table->bigInteger('coupon_applied_user')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('trenta_master_countries');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('trenta_master_states');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('trenta_master_city');
            $table->mediumText('terms_and_conditions')->nullable();
            $table->string('coupon_image_path')->nullable();
            $table->string('coupon_image_name')->nullable();
            $table->unsignedBigInteger('main_category_id')->nullable();
            $table->foreign('main_category_id')->references('id')->on('trenta_master_main_shopping_category');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('trenta_master_submain_shopping_category');
            // $table->unsignedBigInteger('product_id')->nullable();
            // $table->foreign('product_id')->references('id')->on('trenta_master_size');
            $table->integer('product_id')->nullable();
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
        Schema::dropIfExists('trenta_master_coupon_code');
    }
}
