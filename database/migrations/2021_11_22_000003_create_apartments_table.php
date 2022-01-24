<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * {@inheritdoc }
     */
    public function up()
    {
        Schema::hasTable($table = 'apartments') ?: Schema::create($table, function (Blueprint $blueprint) {
            $blueprint->engine = 'InnoDB';
            //
            $blueprint->bigIncrements('id');
            $blueprint->string('apartment_description', 100)->unique();
            $blueprint->unsignedBigInteger('total_rooms');
        });
    }

    /**
     * {@inheritdoc }
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
