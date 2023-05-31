<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        // create brands
        $brands = config('app-brands.brands');
        foreach ($brands as $key => $brand) {
            DB::table('brands')->insert([
                'title' => $brand['title'],
                'description' => $brand['description'],
            ]);    
        }
        
        \App\Models\Car::factory(5)->create();       
    }
}
