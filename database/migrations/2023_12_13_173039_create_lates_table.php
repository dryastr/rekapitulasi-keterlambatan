<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatesTable extends Migration
{
    public function up()
    {
        Schema::create('lates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('date_time_late');
            $table->text('information');
            $table->text('bukti');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lates');
    }
}