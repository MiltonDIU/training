<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllocationDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocation_day', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('allocation_id')->unsigned();
            $table->foreign('allocation_id')->references('id')->on('allocations')->onDelete('cascade');
            $table->integer('day_id')->unsigned()->nullable();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('set null');
            $table->string('begin_time');
            $table->string('close_time');
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
        Schema::dropIfExists('allocation_day');
    }
}
