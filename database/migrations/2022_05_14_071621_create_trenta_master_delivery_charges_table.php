<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaMasterDeliveryChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_master_delivery_charges', function (Blueprint $table) {
            $table->id();
            $table->string('order_amount');
            $table->integer('delivery_charge');
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
        Schema::dropIfExists('trenta_master_delivery_charges');
    }
}
