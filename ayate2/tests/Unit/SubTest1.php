<?php

namespace Tests\Unit;
use Tests\TestCase;
//use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Http\Controllers\submissionsController;
use CreatesApplication;
class SubTest1 extends TestCase
{
    protected $baseUrl = 'http://ayate.dev';

    /*
     * Tests that the submission controller
     * setter and getter works as expected
     */
    public function testSubmission()
    {
        $submissionCon = new submissionsController();
        // $submissionCon->submit()
        $name = $submissionCon->setrName("Sour Delight");
        $this->assertEquals($submissionCon->getrName(), 'Sour Delight');
    }
    

        
    
}