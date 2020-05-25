<?php

use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('relationships')->truncate();

        $relationships = [
            ['name' => 'Mother'],
			['name' => 'Father'],
			['name' => 'Husband'],
			['name' => 'Wife'],
			['name' => 'Daughter'],
			['name' => 'Son'],
			['name' => 'Sister'],
			['name' => 'Brother'],
			['name' => 'Aunt'],
			['name' => 'Uncle'],
			['name' => 'Niece'],
			['name' => 'Nephew'],
			['name' => 'Cousin (female)'],
			['name' => 'Cousin (male)'],
			['name' => 'Grandmother'],
			['name' => 'Grandfather'],
			['name' => 'Granddaughter'],
			['name' => 'Grandson'],
			['name' => 'Cousin (male)'],
			['name' => 'Grandmother'],
			['name' => 'Grandfather'],
        ];

        DB::table('relationships')->insert($relationships);
    }
}
