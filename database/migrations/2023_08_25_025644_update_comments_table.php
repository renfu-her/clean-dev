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
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('clean_staff_id')->comment('清潔人員 ID');
            $table->integer('member_id')->comment('使用者 ID');
            $table->integer('order_id')->comment('訂單 ID');
            $table->integer('star')->comment('評價星數');
            $table->text('content')->comment('評價內容');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
};
