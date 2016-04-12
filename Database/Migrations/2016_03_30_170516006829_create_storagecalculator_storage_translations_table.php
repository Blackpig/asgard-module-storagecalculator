<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageCalculatorStorageTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storagecalculator__storage_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name', 100);
            $table->string('blurb', 255)->nullable();
            $table->string('unit');

            $table->integer('storage_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['storage_id', 'locale'], 'storage_id_locale_unique');
            $table->foreign('storage_id','storage_id_foreign')->references('id')->on('storagecalculator__storages')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storagecalculator__storage_translations');
	}
}
