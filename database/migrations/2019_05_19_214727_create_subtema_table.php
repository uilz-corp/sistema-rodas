<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSubtemasTable.
 */
class CreateSubTemaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('SubTema', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('descricao');
			$table->bigInteger('id_tema');

			$table->foreign('id_tema')->references('id')->on('temas');
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
		Schema::drop('SubTema');
	}
}
