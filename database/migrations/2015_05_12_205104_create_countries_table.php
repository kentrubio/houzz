<?php

use App\Eloquent\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;

/**
 * Class CreateCountriesTable
 */
class CreateCountriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->char('code', 2)->index();
            $table->string('name');

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

    /**
     *
     */
    public function populateCountries()
    {
        $csv = Reader::createFromPath(base_path('resources/assets/ISO3166/ISO3166-1.csv'));

        $csv->setOffset(1);

        $countries = $csv->query();

        foreach ($countries as $index => $country)
        {
            $data = [
                'name' => $country[0],
                'code' => $country[1],
            ];

            Country::create($data);
        }
    }
}
