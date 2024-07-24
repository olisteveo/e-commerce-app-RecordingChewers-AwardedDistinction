<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\Product;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::factory(10)
            ->create()
            ->each(static::product());
    }
    public static function product()
    {
        return function($supplier) {
            Product::factory(10)
                ->create([
                    "supplier_id" => $supplier->id,
                ]);
        };
    }
}
