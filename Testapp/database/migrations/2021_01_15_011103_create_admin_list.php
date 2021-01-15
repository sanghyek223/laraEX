<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_list', function (Blueprint $table) {
            $table->bigIncrements('admin_no');
            $table->unsignedBigInteger('u_id');
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('admin_phone',100);
            $table->foreign('admin_phone')->references('u_phone')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('admin_name',100);
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
        Schema::dropIfExists('admin_list');
    }
}
