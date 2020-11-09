<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            [
                "name" => "administrator",
                "display" => "Administrator",
            ],
            [
                "name" => "admin_legal",
                "display" => "Admin Legal",
            ],
            [
                "name" => "admin_logistik",
                "display" => "Admin Logistik"
            ],
            [
                "name" => "guest",
                "display" => "Guest",
            ]
        ]);

        DB::table('permissions')->insert([
            [
                "name" => "users-list",
                "display" => "List User",
                "menu" => "User",
            ],
            [
                "name" => "roles-list",
                "display" => "List Roles",
                "menu" => "Roles",
            ],
            [
                "name" => "permissions-list",
                "display" => "List Permissions",
                "menu" => "Permissions",
            ],
            [
                "name" => "dashboard",
                "display" => "Dashboard",
                "menu" => "Dashboard",
            ]
        ]);

        DB::table('users')->insert([
            [
                "username" => "fauzi.hanif",
                "name" => "Ahmad Fauzi Hanif",
                "email" => "fauzi.hanif@pins.co.id",
                "role_id" => 1,
                "position" => 'IT Officer 1',
                "password" => bcrypt('gloryHorsePower')
            ],
            [
                "username" => "abdul.muchtar",
                "name" => "Abdul Muchtar Astria",
                "email" => "abdul.muchtar@pins.co.id",
                "role_id" => 1,
                "position" => 'IT Officer 3',
                "password" => bcrypt('gloryHorsePower')
            ],
            [
                "username" => "bayu.respati",
                "name" => "Bayu Respati",
                "email" => "bayu.respati@pins.co.id",
                "role_id" => 1,
                "position" => 'IT Officer 2',
                "password" => bcrypt('gloryHorsePower')
            ],
        ]);
    }
}
