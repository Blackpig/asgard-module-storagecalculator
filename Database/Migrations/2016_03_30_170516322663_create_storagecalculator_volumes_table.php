<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageCalculatorVolumesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storagecalculator__volumes', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('category',100);
            $table->integer('volume');

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
		Schema::drop('storagecalculator__volumes');
	}
}
