<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageCalculatorVolumesTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storagecalculator__volumes_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name', 100);

            $table->integer('volumes_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['volumes_id', 'locale'], 'volumes_id_locale_unique');
            $table->foreign('volumes_id', 'volumes_id_foreign')->references('id')->on('storagecalculator__volumes')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storagecalculator__volumes_translations');
	}
}
