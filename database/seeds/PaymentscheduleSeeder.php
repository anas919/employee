<?php

use Illuminate\Database\Seeder;

class PaymentscheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('paymentschedules')->truncate();

        $paymentschedules = [
            ['pay_schedule' => 'week'],
			['pay_schedule' => 'fortnight'],
			['pay_schedule' => 'month'],
			['pay_schedule' => 'quarter'],
			['pay_schedule' => 'year'],
        ];

        DB::table('paymentschedules')->insert($paymentschedules);
    }
}
