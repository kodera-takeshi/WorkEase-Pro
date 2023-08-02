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
        /* 書籍テーブル */
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('書籍名');
            $table->string('labeling')->comment('ラベリング');
            $table->unsignedBigInteger('status_id')->comment('ステータスID');
            $table->string('note')->comment('備考');
            $table->unsignedBigInteger('office_id')->comment('所在オフィス(オフィスID)');
            $table->unsignedBigInteger('employee_id')->comment('所有者（社員ID）');
            $table->timestamps();
            $table->boolean('del_flg')->default(false)->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
