<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditLogsTable extends Migration
{
    public function up()
    {
        Schema::create('audit_logs', function (Blueprint $table)
        {
            $table->increments('id');

            $table->unsignedInteger('auditable_id');
            $table->string('auditable_type');
            $table->longText('auditable_data');

            $table->unsignedInteger('user_id')->nullable();
            $table->longText('user_data')->nullable();

            $table->unsignedInteger('impersonator_id')->nullable();
            $table->longText('impersonator_data')->nullable();

            $table->string('message_key');
            $table->text('message_parameters');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audit_logs');
    }
}
