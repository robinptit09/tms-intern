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
        $this->command->info('Seeding data to post ...');
        $this->call(PostSeeder::class);
        $this->command->info('Finished');
    }
}
