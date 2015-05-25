<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->char('country_code', 2)->index();
            $table->char('state_code', 10)->index();

            $table->foreign('country_code')->references('code')->on('countries')->onDelete('cascade');
            $table->foreign('state_code')->references('code')->on('states')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cities');
	}

}
