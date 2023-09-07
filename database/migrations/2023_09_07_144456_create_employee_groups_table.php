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
        Schema::create('employee_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('グループ名');
            $table->unsignedBigInteger('company_id')->comment('利用企業ID');
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
