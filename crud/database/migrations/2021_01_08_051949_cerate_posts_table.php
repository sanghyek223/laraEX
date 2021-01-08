<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CeratePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
                $table->increments('no')->primary();
                $table->string('user_id',100);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->string('category');
                $table->string('title');
                $table->string('goods_img')->default('');
                $table->text('contents');
                $table->string('status',50)->default('판매중');
                $table->string('sales_place')->default('서울');
                $table->string('declaration_status',10)->default('N');
                //$table->date('write_day')->default('now()');
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
        Schema::dropIfExists('posts');
    }
}
