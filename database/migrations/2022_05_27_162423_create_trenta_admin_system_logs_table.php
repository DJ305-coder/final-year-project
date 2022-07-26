<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaAdminSystemLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_admin_system_logs', function (Blueprint $table) {
            $table->id();
            $table->longText('new_data')->nullable();
            $table->longText('old_data')->nullable();
            $table->string('model')->nullable();
            $table->string('action')->nullable();
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->string('ip')->nullable();
            $table->longText('agent')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type')->nullable();
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
        Schema::dropIfExists('trenta_admin_system_logs');
    }
}
