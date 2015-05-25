<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('question_id')->nullable();
            $table->integer('book_id')->nullable();
            $table->text('comment');
            $table->text('description');
            $table->integer('updated_by')->unsigned();
            $table->timestamps();

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
		Schema::drop('comments');
	}

}
