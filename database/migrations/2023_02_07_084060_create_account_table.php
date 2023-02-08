<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id('account_id');
            $table->unsignedBigInteger('role_id')->nullable(false);
            $table->unsignedBigInteger('gender_id')->nullable(false);
            $table->string('first_name',25)->nullable(false);
            $table->string('last_name',25)->nullable(false);
            $table->string('email',100)->unique();
            $table->string('display_picture_link',100)->nullable(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('role_id')->on('role')->onDelete('cascade');
            $table->foreign('gender_id')->references('gender_id')->on('gender')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
