<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVersamentiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('versamenti', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('stagione', 9);
			$table->date('data');
			$table->float('importo');
			$table->integer('gas_id');
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
		Schema::drop('versamenti');
	}

}
