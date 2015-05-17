<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotebooksAndNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notebooks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('notes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('notebook_id')->unsigned()->default(0);
            $table->string('title');
            $table->enum('color', ['gray', 'blue', 'green', 'yellow', 'red']);
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('notebook_id')->references('id')->on('notebooks')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notes');
        Schema::drop('notebooks');
	}

}
