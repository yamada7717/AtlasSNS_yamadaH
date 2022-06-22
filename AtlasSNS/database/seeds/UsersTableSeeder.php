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
                'username' => 'Atlas_SNS君',
                'mail' => 'Atlas_SNS@example.com',
                'password' => Hash::make('Atlas-sns'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'テスト',
                'mail' => 'test@test.com',
                'password' => Hash::make('testtest'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => '小島くん',
                'mail' => 'oji@oji.com',
                'password' => Hash::make('ojioji'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'ジュン',
                'mail' => 'kin@niku.com',
                'password' => Hash::make('kinniku'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'test1',
                'mail' => 'test@test1.com',
                'password' => Hash::make('testtest1'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'test2',
                'mail' => 'test@test2.com',
                'password' => Hash::make('testtest2'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}