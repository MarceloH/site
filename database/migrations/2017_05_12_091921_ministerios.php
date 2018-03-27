<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ministerios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ministerios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->longText('descricao');
			$table->string('escala');
			$table->date('dataescala');
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
		Schema::drop('ministerios');
	}

}
