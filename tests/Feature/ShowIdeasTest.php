<?php

namespace Tests\Feature;

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

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
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Title',
            'body' => 'Body of my first title'
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Title',
            'body' => 'Body of my second title'
        ]);

        $response = $this->get('/');

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->body);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->body);
    }

    /**
     * A show single idea feature test.
     *
     * @return void
     */
    public function test_single_idea_shows_on_idea_page()
    {
        $idea = Idea::factory()->create([
            'title' => 'My Second Title',
            'body' => 'Body of my second title'
        ]);

        $response = $this->get(route('show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->body);
    }

    public function test_ideas_pagination_works()
    {
        Idea::factory(Idea::PAGINATION_COUNT + 1)->create();

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
