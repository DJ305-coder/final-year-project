<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaSupportTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_support_ticket', function (Blueprint $table) {
            $table->id();
            $table->string('ticketId')->nullable();
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->longText('description')->nullable();
            $table->longText('pending_remark')->nullable();
            $table->longText('inprogress_remark')->nullable();
            $table->longText('completed_remark')->nullable();
            $table->enum('ticket_status',['pending','inprocess','completed'])->default('pending');
            $table->dateTime('pending_to_inprocess')->nullable();
            $table->dateTime('inprocess_to_completed')->nullable();
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
        Schema::dropIfExists('trenta_support_ticket');
    }
}
