<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('seo_profiles', function (Blueprint $table)
        {
            // Keys
            $table->increments('id');
            $table->morphs('model');

            // Columns
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            // Config
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo_profiles');
    }
}
