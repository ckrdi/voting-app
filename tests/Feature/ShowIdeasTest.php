<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaIndex;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_list_of_ideas_shows_on_main_page()
    {
        $idea = Idea::factory()->create([
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create([ 'name' => 'Test' ]),
            'status_id' => Status::factory()->create([ 'name' => 'Open' ]),
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

    public function test_single_idea_shows_on_idea_page()
    {
        $idea = Idea::factory()->create([
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create([ 'name' => 'Test' ]),
            'status_id' => Status::factory()->create([ 'name' => 'Open' ]),
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
        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create([ 'name' => 'Test' ]),
            'status_id' => Status::factory()->create([ 'name' => 'Open' ]),
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

    public function test_ideas_based_on_status_rendered_correctly()
    {
        $ideaOne = Idea::factory()->create([
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create([ 'name' => 'Test' ]),
            'status_id' => Status::factory()->create([
                'id' =>  2,
                'name' => 'Considering'
            ]),
        ]);

        $ideaTwo = Idea::factory()->create([
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create([ 'name' => 'Test' ]),
            'status_id' => Status::factory()->create([
                'id' =>  5,
                'name' => 'Closed'
            ]),
        ]);

        $this->get('/?status=Considering');

        Livewire::test(IdeaIndex::class, [ 'idea' => $ideaOne, 'votesCount' => $ideaOne->votes_count ])
            ->assertSeeHtml('<div class="bg-purple text-white text-xs font-bold uppercase leading-none rounded-full text-center lg:w-28 h-7 py-2 px-3">Considering</div>', false)
            ->assertDontSeeHtml('<div class="bg-red text-white text-xs font-bold uppercase leading-none rounded-full text-center lg:w-28 h-7 py-2 px-3">Closed</div>', false);

        $this->get('/?status=Closed');

        Livewire::test(IdeaIndex::class, [ 'idea' => $ideaTwo, 'votesCount' => $ideaTwo->votes_count ])
            ->assertDontSeeHtml('<div class="bg-purple text-white text-xs font-bold uppercase leading-none rounded-full text-center lg:w-28 h-7 py-2 px-3">Considering</div>', false)
            ->assertSeeHtml('<div class="bg-red text-white text-xs font-bold uppercase leading-none rounded-full text-center lg:w-28 h-7 py-2 px-3">Closed</div>', false);
    }
}
