<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('styles', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
			$table->timestamps();


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
		Schema::drop('styles');
	}

}
