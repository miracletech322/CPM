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
                    "site_name" => "Folex Mining",
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
                    "email" => "super@folex.com",
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
                    "email" => "admin@folex.com",
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
                    "email" => "user@folex.com",
                    "role_id" => 3,
                    "password" => Hash::make("password")
                ],
            ]
        );
    }
}
