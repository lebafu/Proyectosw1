<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert(array(
        'name' => 'Admin',
        'email' => 'Admin@admin.com',
        'password' => \Hash::make('12345678'),
        'tipo_usuario' => '0'
        ));
    }
}
