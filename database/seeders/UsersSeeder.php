<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Artistprofile;
use App\Models\Product;
use App\Models\Role;
use App\Models\Supplier;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => User::SITE_ADMIN_NAME,
            'email' => User::SITE_ADMIN_EMAIL,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'roles_id' => Role::SITE_ADMIN_ROLE,
        ]);
        User::factory(30)
            ->create()
            ->each(static::artist());
    }

    public static function artist()
    {
        return function($user) {
            if(rand(0,1)) {
                $user->roles_id = Role::ARTIST_ROLE;
                $user->save();
                Artistprofile::factory(1)
                    ->create([
                        "user_id" => $user->id,
                        "name" => $user->name
                    ])
                    ->each(static::artist_supplier());
                // next line starts here
            }
        };
    }

    public static function artist_supplier()
    {
        return function($artistprofile) {
            if (rand(0,1)) {
                Supplier::factory(1)
                    ->create([
                        "artist_profiles_id" => $artistprofile->id
                    ])->each(static::artist_product($artistprofile));
            }
        };
    }

    public static function artist_product($artistprofile)
    {
        return function($supplier) use ($artistprofile) {
            Product::factory(1)
                ->create([
                    "supplier_id" => $supplier->id,
                    "artist_name" => $artistprofile->name
                ]);
        };
    }
}
