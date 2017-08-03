<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('comments')->insert([
          'content' => 'comment bài viết 1',
          'post_id' => 1,
          'author_id' => 1,
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
      DB::table('comments')->insert([
          'content' => 'comment bài viết 1',
          'post_id' => 1,
          'author_id' => 2,
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
      DB::table('comments')->insert([
          'content' => 'comment bài viết 2',
          'post_id' => 2,
          'author_id' => 2,
          'created_at' => '2017-06-27 04:54:56',
          'updated_at' => '2017-06-27 04:54:56'
      ]);
    }
}
