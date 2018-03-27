<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contatos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contatos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->string('telefone',20);
			$table->string('email');
			$table->text('mensagem');
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
		Schema::drop('contatos');
	}

}
