haha<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('from')->index();
            $table->unsignedInteger('to')->index();
            $table->text('message');
            $table->timestamps();

            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
	}

}
