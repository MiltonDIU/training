<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venue_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('batch_id')->unsigned();
            $table->boolean('batch_is_show')->default(true);
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->string('last_date');
            $table->string('course_start_date');
            $table->string('course_end_date')->nullable();
            $table->string('total_hour')->nullable();
            $table->string('total_class')->nullable();
            $table->float('fees')->nullable();
            $table->float('discount_fees')->nullable();
            $table->unique(['course_id','batch_id']);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_schedule')->default(1);
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
        Schema::dropIfExists('allocations');
    }
}
