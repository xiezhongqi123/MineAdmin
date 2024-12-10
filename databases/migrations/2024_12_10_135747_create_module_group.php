<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('module_group', function (Blueprint $table) {
            $table->comment('模块分组表');
            $table->bigIncrements('id')->comment('主键id');
            $table->string('name')->comment('分组名称');
            $table->string('code')->unique()->comment('分组编码');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_group');
    }
};
