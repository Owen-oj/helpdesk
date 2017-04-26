<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->index();
            $table->longText('content');
            $table->string('location')->index();
            $table->integer('status_id')->unsigned()->index();
            $table->integer('priority_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('agent_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->timestamps();
            $table->dateTime('completed_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tickets');
	}

}
