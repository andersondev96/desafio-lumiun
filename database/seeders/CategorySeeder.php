<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Exception;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Category::factory()
            ->count(5)
            ->create();
        } catch (Exception $e) {
            echo($e);
        }
    }
}
