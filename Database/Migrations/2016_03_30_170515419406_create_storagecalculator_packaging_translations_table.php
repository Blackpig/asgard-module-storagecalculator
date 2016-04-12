<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageCalculatorPackagingTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storagecalculator__packaging_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name', 100);
            $table->string('blurb', 255)->nullable();
            $table->string('unit');

            $table->integer('packaging_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['packaging_id', 'locale'], 'packaging_id_locale_unique');
            $table->foreign('packaging_id', 'packaging_id_foreign')->references('id')->on('storagecalculator__packagings')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storagecalculator__packaging_translations');
	}
}
