<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernyataansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernyataans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('jadwal_id');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pd')->nullable();
            $table->string('satker')->nullable();
            $table->tinyInteger('tanya1')->nullable();
            $table->tinyInteger('tanya2')->nullable();
            $table->tinyInteger('tanya3')->nullable();
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
        Schema::dropIfExists('pernyataans');
    }
}
