<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Posts table
        DB::table('posts')->truncate();

        $faker = \Faker\Factory::create();
        $limit = 151;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('posts')->insert([
                'title'      => $faker->title,
                'content'    => $faker->name,
                'enable'     => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
