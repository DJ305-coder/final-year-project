<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaMasterCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_master_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_name');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
            $table->enum('status',['active','inactive','delete'])->default('active');
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
        Schema::dropIfExists('trenta_master_countries');
    }
}
