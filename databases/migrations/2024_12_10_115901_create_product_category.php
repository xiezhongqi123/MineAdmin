<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new
class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->comment('产品分类表');
            $table->bigIncrements('id')->comment('主键');
            $table->bigInteger('parent_id')->unsigned()->comment('父ID');
            $table->string('title', 50)->default('')->unique()->comment('分类名称');
            $table->string('thumbnail',255)->default('')->comment('分类图');
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
        Schema::dropIfExists('product_category');
    }
};
