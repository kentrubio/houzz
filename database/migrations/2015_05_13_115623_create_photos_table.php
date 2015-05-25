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
            $table->string('file_name');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('style_id')->unsigned()->index();
            $table->integer('country')->index();
            $table->integer('state')->index();
            $table->integer('city')->index();
            $table->string('zip');
            $table->string('url')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->char('currency', 3)->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');

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
