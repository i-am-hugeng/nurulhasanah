<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->longText('uraian');
            $table->date('tanggal');
            $table->timestamps();
        });

        //Set Foreign Key di kolom activity_id pada tabel activity_photos
        Schema::table('activity_photos', function(Blueprint $table){
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade')->onUpdate('cascade');
        });

        //Set Foreign Key di kolom activity_id pada tabel activity_videos
        Schema::table('activity_videos', function(Blueprint $table){
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Foreign Key di kolom activity_id di tabel activity_photos
        Schema::table('activity_photos', function(Blueprint $table){
            $table->dropForeign('activity_photos_activity_id_foreign');
        });

        //Drop Foreign Key di kolom activity_id di tabel activity_videos
        Schema::table('activity_videos', function(Blueprint $table){
            $table->dropForeign('activity_videos_activity_id_foreign');
        });

        Schema::dropIfExists('activities');
    }
}
