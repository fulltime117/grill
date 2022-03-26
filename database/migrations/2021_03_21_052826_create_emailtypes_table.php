<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailtypes', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // template name
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->string('logo')->nullable();
            $table->string('subject')->nullable();
            $table->longText('body');
            $table->string('site')->nullable();
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
        Schema::dropIfExists('emailtypes');
    }
}
