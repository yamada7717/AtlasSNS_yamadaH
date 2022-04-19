<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('users')->insert([
            [
                'id' => '',//空にしているが、講師の人に確認する
                'username' => 'Atlas_SNS君',
                'mail' => 'Atlas_SNS@example.com',
                'password' => Hash::make('Atlas-sns'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}