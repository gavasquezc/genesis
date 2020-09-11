<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('publications', function (Blueprint $table) {
            $table->id('id_publications');
            $table->string('pu_desc');
	    $table->Integer('pu_status');
	    $table->unsignedBigInteger('pu_id_user');
            $table->string('pu_titulo');
            $table->string('pu_foto');
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
        Schema::dropIfExists('publications');
    }
}
