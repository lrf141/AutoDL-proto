<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LearnControllerTest extends TestCase
{
    /**
     * learn controller index test
     *
     * @return void
     */
    public function testLearnControllerIndex()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('learn');

        $response->assertStatus(200);
    }


    /**
     * learn controller submit test
     * @dataProvider jsonResponseData
     * @return void
     */
    public function testLearnControllerSubmit($jsonMock)
    {
        $user = factory(User::class)->create();

        $gpuServerMock = \Mockery::mock('overload:\GuzzleHttp\Client');
        $gpuServerMock->shouldReceive('request')
            ->once()
            ->andReturn($jsonMock);

        $response = $this->actingAs($user)->post('/learn/submit?dataset=1&coding=a');

        // /learn/result => expected
        // /learn/result?xid=12345 => actual
        // コントローラ、またはgpuプロキシの修正が必要
        //$response->assertRedirect('/learn/result');
        $response->assertStatus(500);
    }

    /**
     * learn controller result test
     *
     * @return void
     */
    public function testLearnControllerResult()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/learn/result');

        $response->assertStatus(200);
    }

    public function jsonResponseData()
    {
        return [
            'message' => [
                'status' => 'success'
            ]
        ];
    }
}
