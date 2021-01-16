<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InspectorApplicationStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspector_status', function (Blueprint $table) {
            $table->bigIncrements('no');
            $table->unsignedBigInteger('u_id');
            $table->foreign('u_id')->references('id')->on('users');
            $table->integer('status')->default(300);
            $table->text('confirm');
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
        Schema::dropIfExists('inspector_application_status');
    }
}
