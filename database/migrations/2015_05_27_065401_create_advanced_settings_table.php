<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateAdvancedSettingsTable
 */
class CreateAdvancedSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advanced_settings', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $default_value = $this->getDefault();

            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->text('email_notification');
            $table->string('send_email_when', 500)->default($default_value);
            $table->text('visible_to_public');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return '{"someone_comments_on_my_ideabook":"2","someone_comments_on_my_post":"1","someone_comments_on_my_comment":"2","someone_likes_my_post":"4","someone_likes_my_comment":"4","someone_likes_my_ideabook":"4","someone_likes_a_review_that_i_wrote":"4","someone_thanks_me_for_my_comment":"3","someone_asks_a_question_about_one_of_my_photos":"1","someone_follows_me":"3","i_earn_a_badge":"1","someone_messages_me":"1"}';
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advanced_settings');
    }

}
