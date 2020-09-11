<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id_comments');
            $table->string('co_desc');
            $table->Integer('co_status');  
	    $table->unsignedBigInteger('co_id_publicacion');
	    $table->unsignedBigInteger('co_id_user');
	    $table->foreign('co_id_publicacion')->references('id_publications')->on('publications');      
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
        Schema::dropIfExists('comments');
    }
}
