<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table)
        {
            // Keys
            $table->increments('id');

            // Columns
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('template')->nullable();
            $table->longText('data');

            // Config
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
