<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->enum('id',[1]);
            $table->string('title',70);
            $table->string('meta',170)->nullable();
            $table->text('keyword')->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('email',50)->nullable();
            $table->string('logo',50)->nullable();
            $table->string('logo_alt',25);
            $table->text('address')->nullable();
            $table->text('copy_right')->nullable();
            $table->primary('id');
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
        Schema::dropIfExists('settings');
    }
}
