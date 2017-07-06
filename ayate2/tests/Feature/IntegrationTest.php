<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Laracast\Integrated\Extensions\Laravel as IntegrationTest;

class trialTest extends TestCase
{
    /**
     * @return void
     */

    protected $baseUrl = 'http://localhost:8000';

    /*This function checks the
    * welcome page load properly
     */
    function testCheck_that_welcome_page_loads_properly()
    {
        $this->visit('/');
    }
    /*This function checks the
    * submissions page load properly
     */
    function testCheck_that_submissions_page_works_properly()
    {
        $this->visit('/submissions');
    }

    /*This function checks the
    * home page load properly
     */
    function testCheck_that_home_page_loads_properly()
    {
        $this->visit('/home');

    }
    /*This function checks the
    * about page load properly
     */
    function testCheck_that_about_page_loads_properly()
    {
        $this->visit('/about');
    }

    /*
	* this functions follows the link from home
	* to submissions page
    */
    function testFollow_home_link()
    {
        $this->visit('/')
            ->click('Home')
            ->seePageIs('/home')
            ->click('Submissions')
            ->seePageIs('/submissions');
    }

    /* this function follows the register link
    * from the home page
     */
    function testCheck_register_page_loads_properly()
    {
        
        $this->visit('/register');

    }
    /*
     * Tests if the submit form exists
     * on a modal click
     */
    function testSubmit_remedy(){
        $this->visit('/')
            ->click('Home')
            ->seePageIs('/home')
            ->click('Submissions')
            ->click("Submit Remedy")
            ->seePageIs('/submissions');

    }

    /**
     *Tests assuming a professional is logged in,
     * the professional can logout
     */

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
























