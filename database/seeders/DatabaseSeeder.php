<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::factory(5)->create();
        Status::factory()->create([ 'name' => 'Open' ]);
        Status::factory()->create([ 'name' => 'In Progress' ]);
        Status::factory()->create([ 'name' => 'Closed' ]);
        Status::factory()->create([ 'name' => 'Implemented' ]);
        Status::factory()->create([ 'name' => 'Considering' ]);
        Idea::factory(30)->create();
    }
}
