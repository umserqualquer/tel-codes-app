<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_history', function (Blueprint $table) {
            $table->id();
            $table->integer('origin');
            $table->integer('destiny');
            $table->float('value', 8, 2);
            $table->timestamp('start_connect');
            $table->timestamp('end_connect');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
