<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApiList()
    {
        $data = factory(\App\Account::class, 20)->create();

        $response = $this->get('/api/accounts');
        $response->assertStatus(200)->assertJson(['data'=> $data->toArray()]);
        // $response->assertStatus(200)->assertExactJson(['data'=> $data->toArray()]);

    }
}
