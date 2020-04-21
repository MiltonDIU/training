<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllocationEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocation_enrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('allocation_id')->unsigned()->nullable();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('mobile',15);
            $table->text('address')->nullable();
            $table->text('education')->nullable();
            $table->text('remark')->nullable();
            $table->foreign('allocation_id')->references('id')->on('allocations')->onDelete('set null');
            $table->unique(['allocation_id','email']);
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
        Schema::dropIfExists('allocation_enrolls');
    }
}
