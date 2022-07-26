<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();;
            $table->foreign('user_id')->references('id')->on('trenta_users');
            $table->unsignedBigInteger('state_id')->nullable();;
            $table->foreign('state_id')->references('id')->on('trenta_master_states');
            $table->unsignedBigInteger('city_id')->nullable();;
            $table->foreign('city_id')->references('id')->on('trenta_master_city');
            $table->unsignedBigInteger('area_id')->nullable();;
            $table->foreign('area_id')->references('id')->on('trenta_master_area');
            $table->enum('address_type',['home','office','other'])->nullable();
            $table->enum('is_default',['yes','no'])->nullable();
            $table->string('name')->nulllable();
            $table->integer('mobile_number')->nullable();
            $table->integer('pincode')->nullable();
            $table->string('appartment_name')->nullable();
            $table->string('house_no')->nullable();
            $table->string('street')->nullable();
            $table->string('landmark')->nullablr();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('map_address')->nullable();
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
        Schema::dropIfExists('trenta_addresses');
    }
}
