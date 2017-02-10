<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Tests\Browser\Pages\CreateTaskPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTaskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_I_can_create_task_successfully()
    {
        $this->browse(function ($browser) {

            $user = factory(User::class)->create();

            $browser->loginAs($user)
                    ->visit(new CreateTaskPage)
                    ->type('title', 'My Task')
                    ->click('@addTask')
                    ->waitUntilMissing('@addTask')
                    ->assertPathIs('/tasks');
        });
    }
}
