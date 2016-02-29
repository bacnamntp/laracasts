<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * Test basic example
     *
     * @return void
     * @author Me
     */
    public function testBasicExample()
    {
      $this->visit('/')
        ->see('Laravel')
        ->dontSee('Rails');
    }
}
