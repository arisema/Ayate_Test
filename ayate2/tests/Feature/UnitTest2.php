<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modelizer\Selenium\SeleniumTestCase as selenium;
// use Laracast\Integrated\Extensions\Laravel as IntegrationTest;

class trialTest extends TestCase
{
    /**
     * @return void
     */
    protected $baseUrl = 'http://ayate.dev';



    /*	
	* this functions follows the link from submissions page 
	* to submit remedy and sees a message that affirms that
    */
 function testFollow_submissions_link_success()
    {
        $this->visit('/submissions')
            ->seePageIs('submissions')
            ->click('modal')
            ->submitForm("submit_form",[
                 'email'=>'faith@gmail.com',
                 'remedyName'=>'kishoro',
                'diseaseName'=>'gunfan',
                 'description'=> 'bhdfhigrogtwphogdfhbhuldvfbhukrsnkdgrho
             					jbhdssdfhkvgsdfvbhosdfvbsodbkvhdbvu'])
            ->seePageIs('/submissions')
        ->see('You have submitted successfully!');


    }

    function testFollow_submissions_link_faliure()
    {
        $this->visit('/submissions')
            ->seePageIs('submissions')
            ->click('modal')
            ->submitForm("submit_form",[
                'email'=>'faith@gmail.com',
                'remedyName'=>'ssssssssssssssssssssssssssssssssssssssssssss
                ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',
                'diseaseName'=>'gunfan',
                'description'=> 'bhdfhigrogtwphogdfhbhuldvfbhukrsnkdgrho
             					jbhdssdfhkvgsdfvbhosdfvbsodbkvhdbvu'])
            ->seePageIs('/submissions')
            ->see('Remedy name over 50 characters ');


    }
 

   

 

}

/*
   /*
    * this functions follows the link from home
    * to checks login status and checks that the
    *   the page is redirected to login page

 $this->visit('/')
            ->click('Professional')
            ->seeStatusCode(302)
            ->assertRedirectedTo('/login');
            */





















