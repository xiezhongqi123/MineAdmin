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
        Schema::create('article_category', function (Blueprint $table) {
            $table->comment('文章分类表');
            $table->bigIncrements('id')->comment('主键');
            $table->string('title', 100)->default('')->comment('标题');
            $table->tinyInteger('status')->default(1)->comment('状态:1=正常,2=停用');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->authorBy();
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_category');
    }
};
