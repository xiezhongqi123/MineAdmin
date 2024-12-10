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
        Schema::create('module', function (Blueprint $table) {
            $table->comment('模块表');
            $table->bigIncrements('id')->comment('主键id');
            $table->bigInteger('group_id')->nullable()->comment('分组id');
            $table->string('name')->comment('模块名称');
            $table->string('code')->unique()->comment('模块编码');
            $table->string('desc')->nullable()->comment('模块简介');
            $table->tinyInteger('status')->default(1)->comment('状态:1=正常;2=停用');
            $table->json('content')->nullable()->comment('模块内容');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module');
    }
};
