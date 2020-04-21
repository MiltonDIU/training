<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',180);
            $table->string('slug',190);
            $table->integer('venue_id')->unsigned()->nullable();
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('set null');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('program_type_id')->unsigned()->nullable();
            $table->foreign('program_type_id')->references('id')->on('program_types')->onDelete('set null');

            $table->string('banner')->nullable();
            $table->text('summary');
            $table->longText('details');
            $table->boolean('is_paid')->default(0);
            $table->float('fees')->nullable();
            $table->string('begin_date',50);
            $table->string('close_date',50)->nullable();
            $table->boolean('is_active')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
