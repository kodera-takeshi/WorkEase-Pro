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
        /* 従業員テーブル */
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->comment('企業ID');
            $table->string('name')->comment('オフィス名');
            $table->string('phone_number')->comment('電話番号')->nullable();
            $table->string('postal_code')->comment('郵便番号')->nullable();
            $table->string('address')->comment('住所')->nullable();
            $table->timestamps();
            $table->boolean('del_flg')->default(false)->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
