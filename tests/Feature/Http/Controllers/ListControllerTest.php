<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ListControllerTest extends TestCase
{
    public function test_can_view_lists()
    {
        $this->get('/lists')
            ->assertInertia(fn (Assert $page) => $page
                ->component('List/Index')
            );
    }
}
