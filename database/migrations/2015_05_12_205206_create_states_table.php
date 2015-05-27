<?php

use App\Eloquent\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;

/**
 * Class CreateStatesTable
 */
class CreateStatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->char('code', 10)->index();
            $table->string('name');
            $table->char('country_code', 2)->index();

            $table->foreign('country_code')->references('code')->on('countries')->onDelete('cascade');

        });

        $this->populateStates();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('states');
    }

    /**
     *
     */
    public function populateStates()
    {
        $csv = Reader::createFromPath(base_path('resources/assets/ISO3166/ISO3166-2.csv'));

        $csv->setOffset(1);

        $states = $csv->query();

        foreach ($states as $index => $state)
        {
            $data = [
                'code'         => $state[2],
                'name'         => $state[1],
                'country_code' => $state[0],
            ];

            State::create($data);
        }
    }
}
