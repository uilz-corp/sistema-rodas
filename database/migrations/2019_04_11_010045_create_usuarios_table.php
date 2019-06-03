<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsuariosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('senha');
            // $table->char('genero', 1);
            $table->string('cpf', 14)->unique();
            // $table->date('data_nasc');
            $table->string('perfil');
			$table->string('permissao');
			$table->string('formacao', 2);

			$table->bigInteger('id_polo');
			$table->foreign('id_polo')->references('id')->on('polos');
			
			$table->softDeletes();
            $table->timestamps();
            $table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('usuarios');
	}
}
