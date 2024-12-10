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
        Schema::create('navigation', function (Blueprint $table) {
            $table->comment('导航表');
            $table->bigIncrements('id')->comment('主键');
            $table->string('title')->unique()->comment('导航名称');
            $table->string('slug')->nullable()->comment('导航别名');
            $table->bigInteger('parent_id')->default(0)->comment('上级ID');
            $table->string('route')->nullable()->comment('路由地址');
            $table->tinyInteger('route_type')->default(1)->comment('路由类型:1=内链;2=外链');
            $table->integer('sort')->default(0)->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('状态：1=正常;2=停用');
            $table->enum('position', ['top', 'bottom'])->default('bottom')->comment('位置:top=顶部;bottom=底部');
            $table->authorBy();
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation');
    }
};
