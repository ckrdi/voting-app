<?php

namespace Tests\Feature;

use App\Http\Livewire\StatusFilters;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusFiltersTest extends TestCase
{
    use RefreshDatabase;

    public function test_status_filters_rendered_on_index_page()
    {
        $this->get(route('index'))->assertSeeLivewire('status-filters');
    }

    public function test_status_filters_rendered_on_show_page()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $this->get(route('show', $idea))->assertSeeLivewire('status-filters');
    }

    public function test_status_filters_receive_data_correctly()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create([ 'name' => 'Test' ]);
        $status = Status::factory()->create([ 'name' => 'Open' ]);
        Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $statuses = [
            'all_statuses' => 1,
            'open' => 1,
            'considering' => 0,
            'in_progress' => 0,
            'implemented' => 0,
            'closed' => 0
        ];

        Livewire::test(StatusFilters::class)
            ->assertSet('statusCount', $statuses)
            ->assertSee('All Ideas (1)')
            ->assertSee('Considering (0)');
    }
}
