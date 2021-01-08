<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('password');
            $table->integer('u_level')->default('2');
            $table->string('nick',50);            
            $table->string('name');
            $table->string('phone',100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('detailed_address')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('grade',100)->default('basic');
            $table->integer('score')->default('0');
            $table->integer('like_score')->default('0');
            $table->text('keyword',100)->nullable();
            $table->string('login_type',100)->nullable();
            $table->string('token')->nullable();
            $table->string('u_status',100)->default('activation');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
