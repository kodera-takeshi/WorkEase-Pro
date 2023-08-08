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
        /* 管理者テーブル */
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('管理者名');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->string('img_url')->comment('アイコン画像URL')->nullable();
            $table->unsignedBigInteger('admin_role_id')->default(1)->comment('管理者権限ID');
            $table->timestamps();
            $table->boolean('del_flg')->default(false)->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
