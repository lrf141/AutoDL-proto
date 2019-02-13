<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseControllerTest extends TestCase
{
    /**
     * Database controller index test
     *
     * @return void
     */
    public function testDatabaseControllerIndex()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/dataset');

        $response->assertStatus(200);
    }


}
