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
        Schema::create('clean_staff', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('使用者名稱');
            $table->string('email')->comment('E-mail');
            $table->string('password');
            $table->string('phone')->comment('手機號碼')->nullable();
            $table->string('address')->comment('地址')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('line_id')->nullable();
            $table->string('image')->comment('使用者頭像')->nullable();
            $table->integer('offer_price')->default(0)->comment('報價價位');
            $table->text('work_content')->nullable()->comment('工作說明');
            $table->integer('is_pets')->comment('是否接受寵物：0: 否 1: 是');
            $table->integer('is_police_cert')->comment('是否有良民證：0: 否 1: 是');
            $table->integer('is_assn')->comment('是否有家事協會認證：0: 否 1: 是');
            $table->integer('status')->default(0)->comment('狀態：0: 未啓用 1: 啓用 2: 停用');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clean_staff');
    }
};
