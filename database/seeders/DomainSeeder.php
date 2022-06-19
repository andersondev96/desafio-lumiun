<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Domain;
use Exception;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Domain::factory()
            ->count(5)
            ->create();
        } catch (Exception $e) {
            echo($e);
        }
    }
}
