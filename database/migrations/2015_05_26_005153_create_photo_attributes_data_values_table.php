<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoAttributesDataValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo_attributes_data_values', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->increments('id');
            $table->unsignedInteger('photo_id')->index();
            $table->unsignedInteger('attribute_data_id')->index();
            $table->unsignedInteger('categories_attribute_id')->index();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
			$table->timestamps();

            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('attribute_data_id')->references('id')->on('attribute_data')->onDelete('cascade');
            $table->foreign('categories_attribute_id')->references('id')->on('categories_attributes')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photo_attributes_data_values');
	}

}
