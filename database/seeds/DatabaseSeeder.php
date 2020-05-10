<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
        if ($_SERVER['argv'][1] != 'tenants:migrate') {
            return $this->call(LandlordSeeder::class);
        }

        $this->call(RoleSeeder::class);
		$this->call(CountrySeeder::class);
		$this->call(RelationshipSeeder::class);
		$this->call(PaymentrateSeeder::class);
		$this->call(PaymentscheduleSeeder::class);
		$this->call(PaymentmethodSeeder::class);
    }
}
