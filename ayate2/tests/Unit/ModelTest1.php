<?php 
namespace Tests\Unit;
use Tests\TestCase;
use App\JoinRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//PHPUnit_Framework_TestCase
class ModelTest1 extends TestCase
{
  use DatabaseTransactions;

     /**
      * Tests the model submission save
      * value to the database a submitted
      * remedy
      */
      public function check_logged_in(){
        
       

        $this->visit('/submissions')
            ->click('modal')
            ->submitForm("submit form" , [
                'submitterEmail' => 'd@gmail.com',
                'remedyName' =>  'remname',
                'diseaseName' =>  'desname',
                'description' =>  'desc',
                'category' =>  'categ',
                
            ])->seeInDatabase('submissions', ['email' =>'d@gmail.com' ]);
            
            
      

    }
    
    
    
    
    
    

   /* 
   function testBasicTest(){
     
     factory(Article::class,2)->create();// create three articles
     factory(Article::class)->create(['reads'=>10]);// create an article with 10 reads
     $mostPopular=factory(Article::class)->create(['reads'=>20]);//create an article with 20 reads
    
    
    $articles=Article::trending();
    
    $this->assertEquals(($mostPopular->id), $articles->first()->id);
    
    
    
    
    } */
    
       
}