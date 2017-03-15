<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttoriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attori', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('referente_id')->nullable();
			$table->enum('tipo', array('gas','fornaio','mugnaio','contadino'));
			$table->string('nome', 20);
			$table->string('comune', 30);
			$table->string('ragione_sociale');
			$table->string('indirizzo');
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
		Schema::drop('attori');
	}

}
