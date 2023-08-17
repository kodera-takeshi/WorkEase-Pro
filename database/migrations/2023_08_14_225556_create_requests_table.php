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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->comment('企業ID');
            $table->unsignedBigInteger('office_id')->comment('オフィスID');
            $table->integer('classification')->comment('申請区分');
            $table->integer('before_status')->comment('変更前ステータス');
            $table->integer('after_status')->comment('変更後ステータス');
            $table->unsignedBigInteger('request_employee_id')->comment('申請社員ID');
            $table->unsignedBigInteger('change_employee_id')->comment('変更社員ID')->nullable()->default(null);
            $table->boolean('approval_flg')->comment('承認フラグ')->default(false);
            $table->boolean('denial_flg')->comment('否認フラグ')->default(false);
            $table->boolean('cancel_flg')->comment('キャンセルフラグ')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
