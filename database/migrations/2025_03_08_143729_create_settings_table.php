<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->text('site_description');
            $table->string('about_us_image');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('site_email');
            $table->string('site_phone');
            $table->string('site_whatsapp');
            $table->string('site_fax');
            $table->string('site_address');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('site_vedio');
            $table->text('quality_policy');
            $table->text('after_sale_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
