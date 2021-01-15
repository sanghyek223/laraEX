<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_request', function (Blueprint $table) {
            $table->bigIncrements('request_no');
            $table->unsignedBigInteger('inspector');
            $table->foreign('inspector')->references('id')->on('users');
            $table->unsignedBigInteger('seller');
            $table->foreign('seller')->references('id')->on('users');
            $table->unsignedBigInteger('goods_no');
            $table->foreign('goods_no')->references('goods_no')->on('goods');
            $table->string('goods_status',100)->default('판매요청');
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
        Schema::dropIfExists('inspection_request');
    }
}
