<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->longText('banner')->nullable();
            $table->string('banner_title')->nullable();
            
            $table->string('page_name')->default('pagename');
            $table->string('slug')->unique();
            $table->boolean('is_bottom')->default(1);
            $table->boolean('is_top')->default(0);
            
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            
            $table->string('title')->nullable();
            $table->longText('body')->nullable();
            
            $table->boolean('published')->default(0);
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
        Schema::dropIfExists('footers');
    }
}
