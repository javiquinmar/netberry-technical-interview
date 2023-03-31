<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
                ->count(3)
                ->sequence(
                    ['name' => 'PHP'],
                    ['name' => 'Javascript'],
                    ['name' => 'CSS'],
                )
                ->create();
    }
}
