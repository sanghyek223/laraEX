<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Goods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('goods_no');
            $table->unsignedBigInteger('u_id');
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('category');
            $table->string('goods_title');
            $table->text('goods_content');
            $table->string('goods_price');
            $table->string('goods_img')->default('img');
            $table->string('status',50)->default('판매중');
            $table->string('sales_place')->default('서울');
            $table->string('declaration_status',10)->default('N');
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
        Schema::dropIfExists('goods');
    }
}
