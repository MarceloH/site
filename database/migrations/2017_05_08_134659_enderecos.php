<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Enderecos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enderecos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('endereco');
			$table->string('numero');
			$table->string('bairro');
			$table->string('cidade');
			$table->string('estado',2);
			$table->string('cep',9);
			$table->string('telefone',20)->nullable();
			$table->string('celular',20)->nullable();
			$table->string('email');
			$table->text('linkmaps');
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
		Schema::drop('enderecos');
	}

}
