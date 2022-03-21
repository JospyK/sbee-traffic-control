<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoraireUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('horaire_user', function (Blueprint $table) {
            $table->unsignedInteger('horaire_id');
            $table->foreign('horaire_id', 'horaire_id_fk_1881568')->references('id')->on('horaires')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_1881568')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
