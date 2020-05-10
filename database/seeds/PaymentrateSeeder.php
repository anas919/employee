<?php

use Illuminate\Database\Seeder;

class PaymentrateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('paymentrates')->truncate();

        $paymentrates = [
            ['pay_rate' => 'hour'],
			['pay_rate' => 'day'],
			['pay_rate' => 'month'],
        ];

        DB::table('paymentrates')->insert($paymentrates);
    }
}
