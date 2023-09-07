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
        Schema::create('employee_group_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_group_id')->comment('社員グループID');
            $table->unsignedBigInteger('employee_id')->comment('社員ID');
            $table->timestamps();
            $table->boolean('del_flg')->comment('削除フラグ')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_group_members');
    }
};
