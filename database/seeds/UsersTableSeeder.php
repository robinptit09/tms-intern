<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
     public function run()
    {
        DB::table('users')->trunate();
        App\User::create(
            [
                'email'=>'nguyenvanhienptit@gmail.com',
                'password'=>bcrypt('12345')
            ]
        );
    }
}