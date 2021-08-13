<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_status_count_set_properly()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $status1 = Status::factory()->create([ 'name' => 'Open' ]);
        $status2 = Status::factory()->create([ 'name' => 'Considering' ]);
        $status3 = Status::factory()->create([ 'name' => 'In Progress' ]);
        $status4 = Status::factory()->create([ 'name' => 'Implemented' ]);
        $status5 = Status::factory()->create([ 'name' => 'Closed' ]);

        Idea::factory(2)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status1->id
        ]);
        Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status2->id
        ]);
        Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status3->id
        ]);
        Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status4->id
        ]);
        Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status5->id
        ]);

        $this->assertEquals(6, Status::getCount()['all_statuses']);
        $this->assertEquals(2, Status::getCount()['open']);
        $this->assertEquals(1, Status::getCount()['considering']);
        $this->assertEquals(1, Status::getCount()['in_progress']);
        $this->assertEquals(1, Status::getCount()['implemented']);
        $this->assertEquals(1, Status::getCount()['closed']);
    }
}
