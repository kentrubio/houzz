<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class NotificationSettingsTableSeeder
 */
class NotificationSettingsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notification_settings')->delete();
        DB::table('notification_settings')->insert(
            [
                [
                    'id'         => 1,
                    'name'       => 'someone_comments_on_my_ideabook',
                    'values'     => '[1, 2, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 2,
                    'name'       => 'someone_comments_on_my_post',
                    'values'     => '[1, 2, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 3,
                    'name'       => 'someone_comments_on_my_comment',
                    'values'     => '[1, 2, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 4,
                    'name'       => 'someone_likes_my_post',
                    'values'     => '[1, 4, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 5,
                    'name'       => 'someone_likes_my_comment',
                    'values'     => '[1, 4, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 6,
                    'name'       => 'someone_likes_my_ideabook',
                    'values'     => '[1, 4, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 7,
                    'name'       => 'someone_likes_a_review_that_i_wrote',
                    'values'     => '[1, 4, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 8,
                    'name'       => 'someone_thanks_me_for_my_comment',
                    'values'     => '[1, 3, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 9,
                    'name'       => 'someone_asks_a_question_about_one_of_my_photos',
                    'values'     => '[1, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 10,
                    'name'       => 'someone_follows_me',
                    'values'     => '[1, 3, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 11,
                    'name'       => 'i_earn_a_badge',
                    'values'     => '[1, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id'         => 12,
                    'name'       => 'someone_messages_me',
                    'values'     => '[1, 5]',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]
        );
    }
}