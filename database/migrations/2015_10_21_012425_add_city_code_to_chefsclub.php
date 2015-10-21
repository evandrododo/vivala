<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityCodeToChefsclub extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chefsclub', function(Blueprint $table)
		{
			$table->integer('codigo_cidade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chefsclub', function(Blueprint $table)
		{
			$table->dropColumn('codigo_cidade');
		});
	}

}