<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A show ideas feature test.
     *
     * @return void
     */
    public function test_list_of_ideas_shows_on_main_page()
    {
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => User::factory()->create(),
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => $this->faker->words(6, true),
            'body' => $this->faker->paragraphs(2, true)

        ]);
        $response = $this->get('/');

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->body);
        $response->assertSee($idea->created_at->diffForHumans());
        $response->assertSee($idea->category->name);
        $response->assertSee($idea->status->name);
        $response->assertSee($idea->user->avatar());
        $response->assertSee($idea->status->statusClass());
    }

    /**
     * A show single idea feature test.
     *
     * @return void
     */
    public function test_single_idea_shows_on_idea_page()
    {
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => User::factory()->create(),
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => $this->faker->words(6, true),
            'body' => $this->faker->paragraphs(2, true)

        ]);

        $response = $this->get(route('show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->body);
        $response->assertSee($idea->created_at->diffForHumans());
        $response->assertSee($idea->category->name);
        $response->assertSee($idea->status->name);
        $response->assertSee($idea->user->avatar());
        $response->assertSee($idea->user->username);
        $response->assertSee($idea->status->statusClass());
    }

    public function test_ideas_pagination_works()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $ideaOne = Idea::find(1);

        $ideaEleven = Idea::find(11);

        $response = $this->get('/');

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');

        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);
    }
}
