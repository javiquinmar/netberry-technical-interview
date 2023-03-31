<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = Task::factory(10)->create();
        
        // Get array with ids all categories
        $categories = Category::select('id')->pluck('id')->toArray();

        foreach ($tasks as $task) {
            // Get random categories to sync to task
            $taskCategories = Arr::random($categories, rand(1, count($categories)), true);
            $task->categories()->sync($taskCategories);
        }
    }
}
