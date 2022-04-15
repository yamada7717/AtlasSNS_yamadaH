<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['post' => 'ID番号'],
            ['post' => 'だれの投稿か'],
            ['post' => '投稿内容'],
            ['post' => '登録日'],
            ['post' => '更新日']
        ]);
    }
}