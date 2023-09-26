<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pernyataan_id')->nullable();
            $table->string('pd');
            $table->string('satker');
            $table->string('jenis');
            $table->string('bentuk');
            $table->integer('nilai');
            $table->date('tanggal');
            $table->string('pemberi');
            $table->string('hubungan');
            $table->text('alamat');
            $table->text('alasan');
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
        Schema::dropIfExists('lapors');
    }
}
