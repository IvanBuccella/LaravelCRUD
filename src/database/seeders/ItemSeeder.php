<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            DB::table('items')->insert([
                'name' => "Item N." . $i,
            ]);
        }
    }
}
