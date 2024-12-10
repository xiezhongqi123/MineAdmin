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
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键id');
            $table->string('title')->comment('页面标题');
            $table->string('slug')->unique()->comment('页面别名');
            $table->string('desc')->nullable()->comment('页面描述');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('状态:1=正常;2=停用');
            $table->string('meta_title')->default('')->comment('SEO标题');
            $table->string('meta_keywords')->default('')->comment('SEO关键词');
            $table->string('meta_description')->default('')->comment('SEO描述');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
