<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 3)->create();
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'elipdat@gmail.com',
            'password' => bcrypt('elipdat'),
            'role_id' => 1,
            'created_at' => '2017-06-27 04:54:56',
            'updated_at' => '2017-06-27 04:54:56'
        ]);

        DB::table('users')->insert([
            'name' => 'Author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('author'),
            'role_id' => 2,
            'created_at' => '2017-06-27 04:54:56',
            'updated_at' => '2017-06-27 04:54:56'
        ]);

        DB::table('users')->insert([
            'name' => 'User normal',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'role_id' => 3,
            'created_at' => '2017-06-27 04:54:56',
            'updated_at' => '2017-06-27 04:54:56'
        ]);
    }
}
