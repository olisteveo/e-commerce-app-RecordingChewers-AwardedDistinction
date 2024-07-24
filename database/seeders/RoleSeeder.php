<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["id"=>Role::USER_ROLE, "name" => "user"]);
        Role::create(["id"=>Role::ARTIST_ROLE, "name" => "artist"]);
        Role::create(["id"=>Role::SITE_ADMIN_ROLE, "name" => "site-admin"]);
    }
}
