<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateIdea;
use App\Models\Category;
use App\Models\Status;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    function test_idea_form_contains_livewire_component_when_authenticated()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/')->assertSeeLivewire('create-idea');
    }

    function test_idea_form_does_not_contain_livewire_component_when_not_authenticated()
    {
        $this->get('/')->assertDontSeeLivewire('create-idea');
    }

    function test_idea_form_validation_works()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('body', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'body']);
    }

    function test_idea_created_successfully()
    {
        $category = Category::factory()->create([ 'name' => 'Test' ]);

        Status::factory()->create([ 'name' => 'Open' ]);
        
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', $this->faker->words(6, true))
            ->set('category', $category->id)
            ->set('body', $this->faker->paragraph(2, true))
            ->call('createIdea')
            ->assertHasNoErrors(['title', 'category', 'body'])
            ->assertRedirect('/');
    }
}
