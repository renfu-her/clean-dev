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
        Schema::create('clean_staff_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clean_staff_id')->comment('清潔人員 ID');
            $table->string('image')->comment('圖片');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clean_staff_images');
    }
};
