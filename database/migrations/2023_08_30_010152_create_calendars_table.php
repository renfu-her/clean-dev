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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clean_staff_id')->unsigned()->comment('清潔人員 ID');
            $table->string('title')->nullable()->comment('標題');
            $table->text('content')->nullable()->comment('內容');
            $table->string('color')->nullable()->comment('顏色');
            $table->datetime('start_date')->nullable()->comment('開始日期');
            $table->datetime('end_date')->nullable()->comment('結束日期');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
