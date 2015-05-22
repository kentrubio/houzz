<?php

use App\Eloquent\Country;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use League\Csv\Reader;

class CreateCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->string('alpha_2_code');
            $table->string('alpha_3_code');
            $table->string('numeric_code');
            $table->string('iso_3166_2');
        });

        $this->populateCountries();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
	}

    public function populateCountries()
    {
        $csv = Reader::createFromPath(base_path('resources/assets/unlocode/ISO_3166-1.csv'));

        $countries = $csv->query();

        foreach ($countries as $index => $country)
        {
            $data = [
                'name'         => $country[0],
                'alpha_2_code' => $country[1],
                'alpha_3_code' => $country[2],
                'numeric_code' => $country[3],
                'iso_3166_2'   => $country[4],
            ];

            Country::create($data);
        }
    }

}
