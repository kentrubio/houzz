<?php

use App\Eloquent\State;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use League\Csv\Reader;

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
            $table->string('country');
            $table->string('subdivision');
            $table->string('name');
            $table->string('level');
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

    public function populateStates()
    {
        $csv = Reader::createFromPath(base_path('resources/assets/unlocode/2014-2 SubdivisionCodes.csv'));

        $states = $csv->query();

        foreach ($states as $index => $state)
        {
            $data = [
                'country'     => $state[0],
                'subdivision' => $state[1],
                'name'        => $state[2],
                'level'       => $state[3],
            ];

            State::create($data);
        }
    }

}
