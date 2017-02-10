<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SupportEmailsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_I_can_open_modal_for_support_emails()
    {
        $this->browse(function ($browser) {

            $user = factory(User::class)->create();

            $browser->loginAs($user)
                    ->visit('/tasks')
                    ->clickLink('Support Email')
                    ->whenAvailable('#modal-support', function ($modal) use($user) {
                        $modal->assertInputValue('#support-from', $user->email);
                    });
        });
    }
}