<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_kelas");
            $table->foreign("id_kelas")->references("id")->on("kelas");
            $table->unsignedBigInteger("id_materi");
            $table->foreign("id_materi")->references("id")->on("materi");
            $table->unsignedBigInteger("id_asisten");
            $table->foreign("id_asisten")->references("id")->on("users");
            $table->string("teaching_role");
            $table->date("date");
            $table->time("start");
            $table->time("end")->nullable();
            $table->Integer("duration")->nullable();
            $table->unsignedBigInteger("id_code");
            $table->foreign("id_code")->references("id")->on("code");
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
        Schema::dropIfExists('absensi');
    }
}
