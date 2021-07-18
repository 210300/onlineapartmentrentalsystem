<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');            
             $table->string('gewog');
             $table->string('dzongkhag');            
             $table->string('gender');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('avatar')->default('user.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('usertype');
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
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
        Schema::dropIfExists('owners');
    }
}
