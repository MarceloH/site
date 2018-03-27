<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ativsemanais extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ativsemanais', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('dia');
			$table->time('hora');
			$table->text('atividade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ativsemanais');
	}

}
