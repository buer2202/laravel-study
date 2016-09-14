<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
        $this->assertViewHas('articles');
        $this->assertViewHas('tags');
    }

    public function testNotFound()
    {
        $this->call('GET', 'test');
        $this->assertResponseStatus(404);
    }
}
