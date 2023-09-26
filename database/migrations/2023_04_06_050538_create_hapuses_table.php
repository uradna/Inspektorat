<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHapusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hapuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('pd');
            $table->text('alasan');
            $table->string('file')->nullable();
            $table->tinyInteger('status');
            $table->text('feedback')->nullable();
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
        Schema::dropIfExists('hapuses');
    }
}
