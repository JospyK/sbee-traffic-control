<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRetardsTable extends Migration
{
    public function up()
    {
        Schema::table('retards', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_1879188')->references('id')->on('users');
            $table->unsignedInteger('traffic_id');
            $table->foreign('traffic_id', 'traffic_fk_1879189')->references('id')->on('traffic');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1879220')->references('id')->on('teams');
        });
    }
}
