<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('venue_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('banner');
            $table->longText('detail')->nullable();
            $table->boolean('is_active')->default(1);
            //$table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
