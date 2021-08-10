<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaShow;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteShowPageTest extends TestCase
{
    use RefreshDatabase;

    function test_idea_show_rendered_on_the_page()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $this->get(route('show', $idea))->assertSeeLivewire('idea-show');
    }

    public function test_idea_show_receives_data_correctly()
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => $userA->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userA->id
        ]);
        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id
        ]);

        Livewire::test(IdeaShow::class, [ 'idea' => $idea, 'votesCount' => $idea->votes()->count() ])
            ->assertSet('idea', $idea)
            ->assertSet('votesCount', $idea->votes()->count())
            ->assertSee($idea->votes()->count());
    }

    function test_idea_show_rendering_votes()
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => $userA->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userA->id
        ]);
        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id
        ]);

        $this->get(route('show', $idea))->assertViewHas('votesCount', 2);
    }

    function test_logged_in_user_can_see_voted_ideas()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [ 'idea' => $idea, 'votesCount' => $idea->votes()->count() ])
            ->assertSet('hasVoted', true);
    }
}
