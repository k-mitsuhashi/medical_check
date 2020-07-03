<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/users');

        $response->assertOk()
                 ->assertViewIs('user.index')
                 ->assertSeeInOrder([
                     $user['id'],
                     $user['name'],
                     $user['age'],
                     $user['course'],
                     $user['count'],
                     '/users/' . $user['id'],
                 ]);
        // $response->dump();
    }
}
