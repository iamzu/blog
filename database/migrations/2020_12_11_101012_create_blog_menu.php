<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBlogMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_menu', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->comment('名称');
            $table->integer('parent_id')->comment('父级')->default(0);
            $table->integer('order')->default(0)->comment('排序');
            $table->string('icon', 50)->comment('图标');
            $table->string('uri', 50)->comment('链接');
            $table->boolean('show')->default(1)->comment('是否显示 1是0否');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `blog_menu` COMMENT \'博客菜单\'');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_menu');
    }
}
