<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
          'name' => 'Thể Thao',
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
      DB::table('categories')->insert([
          'name' => 'Giáo Dục',
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
      DB::table('categories')->insert([
          'name' => 'Văn Hóa',
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
    }
}
