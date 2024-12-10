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
        Schema::create('article', function (Blueprint $table) {
            $table->comment('文章表');
            $table->bigIncrements('id');
            $table->string('title', 100)->default('')->comment('文章标题');
            $table->string('desc', 100)->default('')->comment('文章简介');
            $table->string('thumbnail',255)->default('')->comment('文章主图');
            $table->text('content')->comment('文章详情');
            $table->tinyInteger('status')->default(1)->comment('状态:1=正常,2=草稿');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->integer('view_sum')->unsigned()->default(0)->comment('阅读次数');
            $table->string('author')->default('')->comment('文章作者');
            $table->dateTime('push_time')->comment('发布时间');
            $table->string('meta_title')->default('')->comment('SEO标题');
            $table->string('meta_keywords')->default('')->comment('SEO关键词');
            $table->string('meta_description')->default('')->comment('SEO描述');
            $table->authorBy();
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
