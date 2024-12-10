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
        Schema::create('tags', function (Blueprint $table) {
            $table->comment('标签表');
            $table->bigIncrements('id')->comment('主键ID');
            $table->string('title')->default('')->nullable()->unique()->comment('标签标题');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
