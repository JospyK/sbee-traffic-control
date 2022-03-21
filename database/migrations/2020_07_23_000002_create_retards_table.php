<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetardsTable extends Migration
{
    public function up()
    {
        Schema::create('retards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duree');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
