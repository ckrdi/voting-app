<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\Status;
use App\Models\Category;
use App\Models\User;
use App\Models\Vote;
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
        User::factory()->create([
            'name' => 'Obiwan Kenobi',
            'username' => 'kenobi',
            'email' => 'generalkenobi@gmail.com',
            'password' => bcrypt('secret') 
        ]);
        User::factory(4)->create();
        
        Category::factory()->create([ 'name' => 'Urgent, Important' ]);
        Category::factory()->create([ 'name' => 'Not Urgent, Important' ]);
        Category::factory()->create([ 'name' => 'Urgent, Not Important' ]);
        Category::factory()->create([ 'name' => 'Not Urgent, Not Important' ]);

        Status::factory()->create([ 'name' => 'Open' ]);
        Status::factory()->create([ 'name' => 'In Progress' ]);
        Status::factory()->create([ 'name' => 'Closed' ]);
        Status::factory()->create([ 'name' => 'Implemented' ]);
        Status::factory()->create([ 'name' => 'Considering' ]);

        Idea::factory(30)->create();

        // generate unique votes
        foreach (range(1, 5) as $user_id) {
            foreach (range(1, 30) as $idea_id) {
                if ($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id
                    ]);
                }
            }
        }
    }
}
