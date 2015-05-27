<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePhotosTable
 */
class CreatePhotosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('project_id')->nullable()->index();
            $table->string('title');
            $table->string('filename');
            $table->integer('category_id')->nullable()->index();
            $table->integer('style_id')->nullable()->index();
            $table->integer('country')->nullable()->index();
            $table->integer('state')->nullable()->index();
            $table->integer('city')->nullable()->index();
            $table->string('zip')->nullable();
            $table->string('url')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->char('currency', 3)->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('photos');
    }
}
