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
        /* 企業テーブル */
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('企業名');
            $table->timestamps();
            $table->boolean('del_flg')->default(false)->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
