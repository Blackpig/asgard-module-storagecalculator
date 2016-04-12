<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageCalculatorDiscountsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storagecalculator__discounts', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('unit');
            $table->integer('amount');
            $table->string('operand')->nullable();

            $table->integer('storage_id')->unsigned()->nullable();

    		$table->foreign('storage_id')->references('id')->on('storagecalculator__storages');

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
		Schema::drop('storagecalculator__discounts');
	}
}
