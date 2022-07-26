<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrentaGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trenta_general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone',10)->nullable();
            $table->string('contact_mobile',10)->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_latitude')->nullable();
            $table->string('contact_longitude')->nullable();
            $table->string('social_media_facebook_url')->nullable();
            $table->string('social_media_twitter_url')->nullable();
            $table->string('social_media_instagram_url')->nullable();
            $table->string('social_media_pinterest_url')->nullable();
            $table->string('social_media_linkedin_url')->nullable();
            $table->string('social_media_website_url')->nullable();
            $table->string('social_media_youtube_url')->nullable();
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
        Schema::dropIfExists('trenta_general_settings');
    }
}
