<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageCalculatorStoragesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storagecalculator__storages', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('unit_price');
            $table->string('discount_type')->nullable();

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
		Schema::drop('storagecalculator__storages');
	}
}
