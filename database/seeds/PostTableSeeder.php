<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([
          'title' => 'Bài viết 1',
          'content' => 'Nội dung bài viết 1',
          'image' => ('anh-bai-viet-1.jpg'),
          'cat_id' => 1,
          'author_id' => 1,
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
      DB::table('posts')->insert([
          'title' => 'Bài viết 2',
          'content' => 'Nội dung bài viết 2',
          'image' => ('anh-bai-viet-2.jpg'),
          'cat_id' => 2,
          'author_id' => 1,
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
      DB::table('posts')->insert([
          'title' => 'Bài viết 3',
          'content' => 'Nội dung bài viết 3',
          'image' => ('anh-bai-viet-3.jpg'),
          'cat_id' => 3,
          'author_id' => 1,
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
      DB::table('posts')->insert([
          'title' => 'Bài viết 4',
          'content' => 'Nội dung bài viết 4',
          'image' => ('anh-bai-viet-4.jpg'),
          'cat_id' => 1,
          'author_id' => 1,
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
    }
}
