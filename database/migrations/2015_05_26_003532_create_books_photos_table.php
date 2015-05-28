<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_photos', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            
            $table->integer('book_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_photos');
	}

}
