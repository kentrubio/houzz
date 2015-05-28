<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class NotificationSettingOptionsTableSeeder
 */
class NotificationSettingOptionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notification_setting_options')->delete();
        DB::table('notification_setting_options')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'every_time',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 2,
                    'name'       => 'limit_1_per_hour_per_post',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 3,
                    'name'       => 'limit_2_per_day',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 4,
                    'name'       => 'limit_5_per_day',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 5,
                    'name'       => 'never',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]
        );
    }
}