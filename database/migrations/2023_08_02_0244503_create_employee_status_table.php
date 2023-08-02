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
        /* 社員ステータステーブル */
        Schema::create('employee_status', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('社員ステータス');
            $table->timestamps();
            $table->boolean('del_flg')->default(false)->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_status');
    }
};
