<?php

namespace Tests\Unit;
use Tests\TestCase;
//use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Http\Controllers\submissionsController;
use CreatesApplication;
class SubmissionTest extends TestCase
{
        
 /**
 @expectedException Exception
  */

    /*
     * Tests if submitted remedy name is beyond the limit
     * submission controller throws an exception
     */
    public function testSubmission(){
       $submissionCon= new submissionsController();
      // $submissionCon->submit();
       $submissionCon->setrName("jxjfklsdfjfjlmfklsjkdsdlasjdasldjkasjdasjasdjsldjaldjasdjjdkasjdkladladjaksdjasdkajsdajkdjaskdjasdjaskdsjdajdajdasjdsjdsdjksjdasdjksjdksjdksdkdsadkjskdjskdjsdjasdjasdkdkas");
      //$this->assertInstanceOf('DateTime', $submissionCon->getrName());
       
    }
}