<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFosterChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foster_children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_anak');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('tingkat_pendidikan');
            $table->string('nama_sekolah');
            $table->string('status_asuh');
            $table->string('foto');
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
        Schema::dropIfExists('foster_children');
    }
}
