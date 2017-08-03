<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // factory(App\RoleGroup::class, 2)->create();
      DB::table('roles')->insert([
          'name' => 'Adminitrator',
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);

      DB::table('roles')->insert([
          'name' => 'Author',
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);

      DB::table('roles')->insert([
          'name' => 'User',
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
    }
}
