<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePolosTable.
 */
class CreatePolosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('polos', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');

			$table->bigInteger('tipo_polo');
			$table->foreign('tipo_polo')->references('id')->on('tipo_polos');

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
		Schema::drop('polos');
	}
}
