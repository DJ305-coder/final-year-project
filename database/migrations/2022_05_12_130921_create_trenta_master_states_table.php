<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaMasterStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('trenta_master_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('trenta_master_countries');
            $table->string('state_name');
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
        Schema::dropIfExists('trenta_master_states');
    }
}
