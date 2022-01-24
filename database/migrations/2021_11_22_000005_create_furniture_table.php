<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFurnitureTable extends Migration
{
    /**
     * {@inheritdoc }
     */
    public function up()
    {
        Schema::hasTable($table = 'furnitures') ?: Schema::create($table, function (Blueprint $blueprint) {
            $blueprint->engine = 'InnoDB';
            //
            $blueprint->bigIncrements('id');
            $blueprint->string('furniture_description', 100);
            $blueprint->timestamp('check_in_date')->nullable()->default(Schema::getConnection()->raw('CURRENT_TIMESTAMP'));
            $blueprint->timestamp('check_out_date')->nullable();
            $blueprint->unsignedBigInteger('room_id');
            // indexes
            $blueprint->unique(['room_id', 'furniture_description']);
            // joins
            $blueprint->foreign('room_id')->references('id')->on('rooms')->onDelete('SET NULL');
        });
    }

    /**
     * {@inheritdoc }
     */
    public function down()
    {
        Schema::dropIfExists('furnitures');
    }
}
