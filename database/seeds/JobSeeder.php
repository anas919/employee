<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('jobs')->truncate();

        $jobs = [
            ['title' => 'Developer'],
        ];

        DB::table('jobs')->insert($jobs);
    }
}
