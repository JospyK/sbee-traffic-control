<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrafficTable extends Migration
{
    public function up()
    {
        Schema::create('traffic', function (Blueprint $table) {
            $table->increments('id');
            $table->time('entre');
            $table->time('sortie')->nullable();
            $table->float('temperature', 4, 2)->nullable();
            $table->string('suite')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
