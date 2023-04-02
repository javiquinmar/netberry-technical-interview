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
                    [
                        'name' => 'PHP',
                        'bg_hex_color' => '#7a86b8',
                        'text_hex_color' => '#ffffff'
                    ],
                    [
                        'name' => 'Javascript',
                        'bg_hex_color' => '#efd81d',
                        'text_hex_color' => '#000000'
                    ],
                    [
                        'name' => 'CSS',
                        'bg_hex_color' => '#0068ba',
                        'text_hex_color' => '#ffffff'
                    ],
                )
                ->create();
    }
}
