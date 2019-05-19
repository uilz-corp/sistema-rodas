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
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('senha');
            $table->string('genero');
            $table->string('cpf');
            $table->string('data_nasc');
            $table->string('perfil');
			$table->string('permissao');
			
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
