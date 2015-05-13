<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePivotAttributeDataPhotoTable
 */
class CreatePivotAttributeDataPhotoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_data_photo', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('attribute_data_id')->unsigned()->index();
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('attribute_data_id')->references('id')->on('attribute_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attribute_data_photo');
    }

}
