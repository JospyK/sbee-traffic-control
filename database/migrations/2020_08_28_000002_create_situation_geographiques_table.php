<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituationGeographiquesTable extends Migration
{
    public function up()
    {
        Schema::create('situation_geographiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('libelle');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
