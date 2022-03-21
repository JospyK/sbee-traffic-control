<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorairesTable extends Migration
{
    public function up()
    {
        Schema::create('horaires', function (Blueprint $table) {
            $table->increments('id');
            $table->time('arrivee');
            $table->time('depart');
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
