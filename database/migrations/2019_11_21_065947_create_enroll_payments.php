<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('allocation_enroll_id')->unsigned()->nullable();
            $table->foreign('allocation_enroll_id')->references('id')->on('allocation_enrolls')->onDelete('set null');
            $table->string('amount',10);
            $table->string('transaction',50);
            $table->string('payment_type',20)->nullable();
            $table->enum('is_online',['yes','no'])->nullable();
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
        Schema::dropIfExists('enroll_payments');
    }
}
