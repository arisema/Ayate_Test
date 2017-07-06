<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Modelizer\Selenium\SeleniumTestCase;

class ExampleTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    protected $webdriver;
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testIndex_view()
    {
        $this->webdriver
            ->visit();
        ;
        

    }

    function testFollow_professional_link()
    {
        $user = factory(User::class)->make();
        $this->actingAs($user)
            ->withSession(['session' => 'value'])
            ->visit('/')
            ->click('professional')
            ->seePageIs("/profile")
            ->click('dropdown')
            ->click('Logout');
    }

}
