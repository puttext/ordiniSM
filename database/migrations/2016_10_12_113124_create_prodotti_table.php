<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdottiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prodotti', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ordine_id');
			$table->integer('fornitore_id');
			$table->enum('tipo', array('pane','farina','granella','altro'));
			$table->string('sottotipo');
			$table->string('descrizione');
			$table->string('quantita');
			$table->float('prezzo_fornitore');
			$table->float('contributo_des');
			$table->float('contributo_sm');
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
		Schema::drop('prodotti');
	}

}
