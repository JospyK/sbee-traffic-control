<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1879219')->references('id')->on('teams');
            $table->unsignedInteger('situation_geographique_id')->nullable();
            $table->foreign('situation_geographique_id', 'situation_geographique_fk_2080934')->references('id')->on('situation_geographiques');
            $table->unsignedInteger('direction_id')->nullable();
            $table->foreign('direction_id', 'direction_fk_2080946')->references('id')->on('directions');
        });
    }
}
