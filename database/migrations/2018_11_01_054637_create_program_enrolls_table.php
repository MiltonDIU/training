<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_enrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id')->unsigned()->nullable();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('mobile',15);
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('set null');
            $table->unique(['program_id','email']);
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
        Schema::dropIfExists('program_enrolls');
    }
}
