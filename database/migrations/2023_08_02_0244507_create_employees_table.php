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
        /* 社員テーブル */
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('従業員名');
            $table->string('email')->comment('メールアドレス')->unique();
            $table->string('password')->comment('パスワード');
            $table->string('birthday')->comment('誕生日')->nullable();
            $table->unsignedBigInteger('office_id')->comment('所属オフィスID')->nullable();
            $table->unsignedBigInteger('managerial_position_id')->comment('役職ID')->nullable();
            $table->unsignedBigInteger('employee_status_id')->comment('社員ステータスID');
            $table->timestamps();
            $table->boolean('del_flg')->default(false)->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
