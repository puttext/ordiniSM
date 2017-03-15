<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdiniDettagliTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordini_dettagli', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('prodotto_id');
			$table->integer('gas_id');
			$table->integer('quantita')->nullable();
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
		Schema::drop('ordini_dettagli');
	}

}
