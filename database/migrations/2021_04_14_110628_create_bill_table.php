<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1);
            $table->integer('tag_id')->comment('账单类别');
            $table->integer('parent_tag_id')->comment('主账单类别');
            $table->tinyInteger('type')->default('1')->comment('1 支出 2收入');
            $table->integer('money')->default('0')->comment('金额单位分');
            $table->string('remarks')->nullable()->comment('备注');
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
        Schema::dropIfExists('bill');
    }
}
