<?php

use App\Eloquent\City;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use League\Csv\Reader;

class CreateCitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('locode');
            $table->string('name')->nullable();
            $table->string('name_wo_diacritics')->nullable();
            $table->string('sub_div')->nullable();
            $table->string('function')->nullable();
            $table->string('status')->nullable();
            $table->string('date')->nullable();
            $table->string('iata')->nullable();
            $table->string('coordinates')->nullable();
            $table->string('remarks')->nullable();
        });

        $this->populateCities();
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

    public function populateCities()
    {
        $csvs = [
            'resources/assets/unlocode/2014-2 UNLOCODE CodeListPart1.csv',
            'resources/assets/unlocode/2014-2 UNLOCODE CodeListPart2.csv',
            'resources/assets/unlocode/2014-2 UNLOCODE CodeListPart3.csv'
        ];

        foreach ($csvs as $csv)
        {
            $file = Reader::createFromPath(base_path($csv));

            $cities = $file->query();

            foreach ($cities as $index => $city)
            {
                $data = [
                    'locode'             => $city[1] . ' ' . $city[2],
                    'name'               => $city[3],
                    'name_wo_diacritics' => $city[4],
                    'sub_div'            => $city[5],
                    'function'           => $city[6],
                    'status'             => $city[7],
                    'date'               => $city[8],
                    'iata'               => $city[9],
                    'coordinates'        => $city[10],
                    'remarks'            => $city[11],
                ];

                City::create($data);
            }
        }


    }

}
