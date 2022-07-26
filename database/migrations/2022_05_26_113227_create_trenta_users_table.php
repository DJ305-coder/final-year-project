<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state_id')->nullable();;
            $table->foreign('state_id')->references('id')->on('trenta_master_states');
            $table->unsignedBigInteger('city_id')->nullable();;
            $table->foreign('city_id')->references('id')->on('trenta_master_city');
            $table->unsignedBigInteger('area_id')->nullable();;
            $table->foreign('area_id')->references('id')->on('trenta_master_area');
            $table->string('email')->unique();
            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('phone_number')->nullable();
            $table->string('username')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('pincode')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('access_token')->nullable();
            $table->enum('app_notification', ['on','off'])->default('on');
            $table->enum('email_notification', ['on','off'])->default('on');
            $table->dateTime('last_login')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('trenta_users');
    }
}
