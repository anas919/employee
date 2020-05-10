<?php

use Illuminate\Database\Seeder;

class PaymentmethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('paymentmethods')->truncate();

        $paymentmethods = [
            ['pay_method' => 'cash'],
			['pay_method' => 'cheque'],
			['pay_method' => 'credit_transfer'],
        ];

        DB::table('paymentmethods')->insert($paymentmethods);
    }
}
