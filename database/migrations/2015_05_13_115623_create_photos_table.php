<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePhotosTable
 */
class CreatePhotosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('type_id')->unsigned()->index();
            $table->integer('parent_type_id')->unsigned()->index();
            $table->string('name');
            $table->string('description');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('photo_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }
}
