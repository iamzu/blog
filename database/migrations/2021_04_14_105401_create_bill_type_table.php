<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag')->default('');
            $table->integer('user_id')->default('1');
            $table->tinyInteger('status')->default('1')->comment('1启用 2禁用');
            $table->integer('income_money')->default('0')->comment('收入金额  单位分');
            $table->integer('expenditure_money')->default('0')->comment('支出金额 单位分');
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
        Schema::dropIfExists('bill_type');
    }
}
