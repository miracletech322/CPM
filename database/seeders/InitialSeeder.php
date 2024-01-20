<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB, Hash, Str;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        DB::table("hashings")->truncate();
        DB::table("hashings")->insert(
            [
                [
                    "name" => "SHA-256",
                ],
                [
                    "name" => "Ethash",
                ],
                [
                    "name" => "KHeavyHash",
                ]
            ]
        );
        
        return;


        DB::table("roles")->truncate();
        DB::table("roles")->insert(
            [
                [
                    "name" => "superadmin",
                ],
                [
                    "name" => "admin",
                ],
                [
                    "name" => "user",
                ]
            ]
        );


        DB::table("settings")->truncate();
        DB::table("settings")->insert(
            [
                [
                    "site_logo" => "",
                    "site_name" => "CloudMinePool",
                    
                    "sha_price_th" => "5",
                    "sha_cost_per_kwh" => "0.067",
                    "sha_power_consumption" => "32.50",
                    "sha_maintenance_fee" => "15",

                    "eth_price_mh" => "5",
                    "eth_cost_per_kwh" => "0.12",
                    "eth_power_consumption" => "0.7",
                    "eth_maintenance_fee" => "15",

                    "equi_price_kh" => "5",
                    "equi_cost_per_kwh" => "0.12",
                    "equi_power_consumption" => "10",
                    "equi_maintenance_fee" => "15",

                    "sha_min" => "250",
                    "sha_max" => "50000",
                    "eth_min" => "250",
                    "eth_max" => "50000",
                    "equi_min" => "250",
                    "equi_max" => "50000"
                ],
            ]
        );


        DB::table("users")->truncate();
        DB::table("users")->insert(
            [
                [
                    "public_id" => (string) Str::uuid(),
                    "first_name" => "Super",
                    "last_name" => "Admin",
                    "email" => "super@cloudminepool.com",
                    "role_id" => 1,
                    "password" => Hash::make("password")
                ],
            ]
        );

        DB::table("users")->insert(
            [
                [
                    "public_id" => (string) Str::uuid(),
                    "first_name" => "Admin",
                    "last_name" => "Admin",
                    "email" => "admin@cloudminepool.com",
                    "role_id" => 2,
                    "password" => Hash::make("password")
                ],
            ]
        );


        DB::table("users")->insert(
            [
                [
                    "public_id" => (string) Str::uuid(),
                    "first_name" => "User",
                    "last_name" => "User",
                    "email" => "user@cloudminepool.com",
                    "role_id" => 3,
                    "password" => Hash::make("password")
                ],
            ]
        );
    }
}
