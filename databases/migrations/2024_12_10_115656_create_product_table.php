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
        Schema::create('product', function (Blueprint $table) {
            $table->comment('产品表');
            $table->bigIncrements('id')->comment('主键');
            $table->bigInteger('category_id')->unsigned()->comment('一级分类');
            $table->bigInteger('category_tow_id')->unsigned()->comment('二级分类');
            $table->string('title',255)->default('')->comment('产品标题');
            $table->text('desc')->nullable()->comment('产品简介');
            $table->string('marking',100)->default('')->comment('产品型号');
            $table->string('ref',100)->default('')->comment('产品编号');
            $table->string('thumbnail',255)->default('')->comment('产品主图');
            $table->text('images')->comment('产品缩略图');
            $table->string('drawing_2D',255)->default('')->comment('2D图纸');
            $table->string('drawing_3D',255)->default('')->comment('3D图纸');
            $table->text('content')->comment('产品详情');
            $table->string('cases_video')->default('')->comment('案例视频');
            $table->json('spec_json')->comment('参数规格');
            $table->tinyInteger('status')->default(1)->comment('状态:1=正常,2=下架');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->string('meta_title',255)->default('')->comment('SEO标题');
            $table->string('meta_keywords',255)->default('')->comment('SEO关键词');
            $table->string('meta_description',255)->default('')->comment('SEO描述');
            $table->authorBy();
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
