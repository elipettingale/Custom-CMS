<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table)
        {
            // Keys
            $table->increments('id');
            $table->morphs('addressable');

            // Columns
            $table->string('line_1');
            $table->string('line_2')->nullable();
            $table->string('city');
            $table->string('postcode', 10);

            // Config
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
