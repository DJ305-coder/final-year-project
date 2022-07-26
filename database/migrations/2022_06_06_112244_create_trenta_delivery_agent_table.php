<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaDeliveryAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_delivery_agent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('trenta_master_countries');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('trenta_master_states');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('trenta_master_city');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('mobile_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->integer('salary')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('profile_image_path')->nullable();
            $table->string('profile_image_name')->nullable();
            $table->integer('aadhar_card_number')->nullable();
            $table->string('aadhar_card_image_path')->nullable();
            $table->string('aadhar_card_image_name')->nullable();
            $table->string('pan_card_number')->nullable();
            $table->string('pan_card_image_path')->nullable();
            $table->string('pan_card_image_name')->nullable();
            $table->string('DL_number')->nullable();
            $table->string('DL_image_path')->nullable();
            $table->string('DL_image_name')->nullable();
            $table->string('RC_book_number')->nullable();
            $table->string('RC_image_path')->nullable();
            $table->string('RC_image_name')->nullable();
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
        Schema::dropIfExists('trenta_delivery_agent');
    }
}
