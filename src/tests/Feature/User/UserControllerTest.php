<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Record;
use App\Http\Resources\User\UserListResource;
use App\Http\Resources\User\UserDetailResource;
use App\Http\Resources\User\RecordResource;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = factory(User::class)->create();
        $user = (new UserListResource($user))->toArray(null);

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

    public function testDetail()
    {
        $user = factory(User::class)->create();
        $record = $user->records()->create(
            factory(Record::class)->make()->toArray()
        );

        $user = (new UserDetailResource($user))->toArray(null);
        $record = (new RecordResource($record))->toArray(null);

        $this->get('/users/0')->assertNotFound();
        $this->get('/users/a')->assertNotFound();

        $response = $this->get('/users/' . $user['id']);

        $response->assertOk()
                 ->assertViewIs('user.detail')
                 ->assertSeeInOrder([
                    $user['id'],
                    $user['name'],
                    $user['birth_date'],
                    $user['age'],
                    $user['course'],
                ])
                ->assertSeeInOrder([
                    $record['year'],
                    $record['date'],
                    $record['course'],
                    $record['place'],
                ]);
        // $response->dump();
    }
}
