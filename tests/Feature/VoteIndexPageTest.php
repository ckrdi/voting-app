<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaIndex;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;

    function test_idea_index_rendered_on_the_page()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $this->get('/')->assertSeeLivewire('idea-index');
    }

    public function test_idea_index_receives_data_correctly()
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

        Livewire::test(IdeaIndex::class, [ 'idea' => $idea, 'votesCount' => $idea->votes_count ])
            ->assertSet('idea', $idea)
            ->assertSet('votesCount', $idea->votes_count)
            ->assertSee($idea->votes_count);
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

        $data = Idea::with('user', 'category', 'status')
            ->addSelect([ 'voted_by_user' => Vote::select('id')
                ->where('user_id', $user->id)
                ->whereColumn('idea_id', 'ideas.id') ])
            ->withCount('votes')
            ->first();

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [ 'idea' => $data, 'votesCount' => $data->votes_count ])
            ->assertSet('hasVoted', true)
            ->assertSee($data->votes_count);
    }

    function test_user_redirected_to_login_when_clicking_vote_if_not_authenticated()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        Livewire::test(IdeaIndex::class, [ 'idea' => $idea, 'votesCount' => $idea->votes_count ])
            ->call('vote')
            ->assertRedirect(route('login'));
    }

    function test_authenticated_user_can_vote_an_idea()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [ 'idea' => $idea, 'votesCount' => $idea->votes_count ])
            ->call('vote')
            ->assertSet('votesCount', 1)
            ->assertSet('hasVoted', true);

        $this->assertDatabaseHas('votes', [
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);
    }

    function test_authenticated_user_can_unvote_an_idea()
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

        $data = Idea::with('user', 'category', 'status')
            ->addSelect([ 'voted_by_user' => Vote::select('id')
                ->where('user_id', $user->id)
                ->whereColumn('idea_id', 'ideas.id') ])
            ->withCount('votes')
            ->first();

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [ 'idea' => $data, 'votesCount' => $data->votes_count ])
            ->call('vote')
            ->assertSet('votesCount', 0)
            ->assertSet('hasVoted', false);

        $this->assertDatabaseMissing('votes', [
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);
    }
}
