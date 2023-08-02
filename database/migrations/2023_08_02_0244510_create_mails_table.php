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
        /* メールテーブル */
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('from_employee_id')->comment('所有者（社員ID）');
            $table->string('to_employee_id')->comment('所有者（社員ID）');
            $table->string('cc_employee_id')->comment('所有者（社員ID）')->nullable();
            $table->string('bcc_employee_id')->comment('所有者（社員ID）')->nullable();
            $table->string('title')->comment('タイトル');
            $table->string('body')->comment('本文');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
