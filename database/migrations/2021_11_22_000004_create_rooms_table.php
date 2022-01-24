<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * {@inheritdoc }
     */
    public function up()
    {
        Schema::hasTable($table = 'rooms') ?: Schema::create($table, function (Blueprint $blueprint) {
            $blueprint->engine = 'InnoDB';
            //
            $blueprint->bigIncrements('id');
            $blueprint->unsignedBigInteger('apartment_id');
            $blueprint->string('room_type', 100);
            // indexes
            $blueprint->unique(['apartment_id', 'room_type']);
            // joins
            $blueprint->foreign('apartment_id')->references('id')->on('apartments')->onDelete('CASCADE');
        });
    }

    /**
     * {@inheritdoc }
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
