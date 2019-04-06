<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    /**
     * Home Controller Index Test
     *
     * @return void
     */
    public function testHomeControllerIndex()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
    }
}
