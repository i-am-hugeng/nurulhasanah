<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundationProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->longText('uraian');
            $table->timestamps();
        });

        //Set Foreign Key di kolom profile_id pada tabel foundation_photo_profiles
        Schema::table('foundation_photo_profiles', function(Blueprint $table){
            $table->foreign('profile_id')->references('id')->on('foundation_profiles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Foreign Key di kolom profile_id di tabel foundation_photo_profiles
        Schema::table('foundation_photo_profiles', function(Blueprint $table){
            $table->dropForeign('foundation_photo_profiles_profile_id_foreign');
        });

        Schema::dropIfExists('foundation_profiles');
    }
}
