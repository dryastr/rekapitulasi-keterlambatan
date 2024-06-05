<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rombel_id');
            $table->unsignedBigInteger('rayon_id');
            $table->string('nis');
            $table->string('name');
            $table->timestamps();

            $table->foreign('rombel_id')
                ->references('id')
                ->on('rombels');

            $table->foreign('rayon_id')
                ->references('id')
                ->on('rayons');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
