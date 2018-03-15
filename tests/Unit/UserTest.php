<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     //Test For Home Page
    public function testIndexTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    //Test For Job Page
    public function testJobTest()
    {
        $response = $this->get('/job');
        $response->assertStatus(200);
    }
    
}
