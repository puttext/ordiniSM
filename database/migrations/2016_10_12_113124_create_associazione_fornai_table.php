<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssociazioneFornaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('associazione_fornai', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('stagione', 9);
			$table->integer('fornaio_id');
			$table->integer('gas_id');
			$table->integer('giorno');
			$table->date('valido_dal')->nullable();
			$table->date('valido_al')->nullable();
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
		Schema::drop('associazione_fornai');
	}

}
