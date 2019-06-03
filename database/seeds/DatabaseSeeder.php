<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('tipo_polos')->insert([
            'descricao' => 'Tipo de polo 1',
        ]);

        DB::table('polos')->insert([
            'descricao' => 'Polo 1',
            'tipo_polo' => '1',
        ]);

        DB::table('usuarios')->insert([
            'cpf' => '123',
            'nome' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'senha' => bcrypt('123'),
            // 'genero' => 'M',
            'perfil' => 'Administrador',
            'permissao' => 'admin',
            'formacao' => 'ES',
            'id_polo' => '1',
            // 'data_nasc' => '2000-01-01'
        ]);
    }
}
