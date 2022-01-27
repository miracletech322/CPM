<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CryptoOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("crypto_options")->truncate();
        DB::table("crypto_options")->insert(
            [
                [
                    "name" => "Bitcoin",
                ],
                [
                    "name" => "Ethereum",
                ],
                [
                    "name" => "Litecoin",
                ],
                [
                    "name" => "Bitcoin Cash",
                ],
                [
                    "name" => "USD Coin",
                ],
                [
                    "name" => "Tether",
                ],
                [
                    "name" => "Binance Coin",
                ],
                [
                    "name" => "Bitcoin Cash",
                ]
            ]
        );

    }
}
