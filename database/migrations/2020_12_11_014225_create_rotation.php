<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotation', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名称');
            $table->string('image')->comment('图片地址')->nullable();
            $table->boolean('status')->default(1)->comment('状态1启用 0禁止');
            $table->string('url')->comment('跳转地址');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `rotation` COMMENT \'轮播图\'');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rotation');
    }
}
