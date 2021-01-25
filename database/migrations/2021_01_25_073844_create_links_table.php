<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('网站名称');
            $table->string('email')->nullable()->comment('站长邮箱');
            $table->string('url')->default('')->comment('地址');
            $table->integer('index')->default('0')->comment('权重');
            $table->tinyInteger('status')->default('1')->comment('1启用2禁用');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
