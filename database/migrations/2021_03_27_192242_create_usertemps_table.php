<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertemps', function (Blueprint $table) {
            $table->id();
            $table->string('phone_token');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->string('username')->nullable();
            $table->string('phone');
            $table->string('identity');
            $table->string('company');
            $table->string('address');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->binary('sign_data')->nullable();
            $table->boolean('ask_pay')->default(0);
            $table->string('lessons')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('usertemps');
    }
}
