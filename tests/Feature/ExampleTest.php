<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ExampleTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeResponseStatus() // test
    {
        $response = $this->get('/'); //assertion

        $response->assertStatus(200);
    }

    public function testAuthentication(){ // test
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200); //assertion

        /* passando um guardian user + guardian
        $response = $this->actingAs($user, 'api')->get('/home');
        */

        /* retorna 303
        $user = factory(\App\User::class)->create();
        $response = $this->get('/home');
        $response->assertStatus(200);
        */
    }


    public function testDatabaseUsers(){ // test

        factory(User::class)->create([
            'email' => 'teste@teste.com.br'
        ]);

        //assertion
        $this->assertDatabaseHas('users', [
                'email' => 'teste@teste.com.br'
        ]);
    }
}
