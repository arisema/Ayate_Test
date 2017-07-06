<?php

namespace Tests\Feature;
use App\debunk;
use App\submission;
use App\User;
use Illuminate\Database\Eloquent;
use App\Http\Controllers\professionalController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Constraint;

class ExampleTest extends TestCase
{
    protected $baseUrl = 'http://ayate.dev';

    /**
     * Test for the professionalController.getSubmission
     * method which returns array of Eloquent\Collection
     * to the view
     *
     * @return void
     */
    public function testBasicTest()
    {
        $data = professionalController::getSubmission();
        $this->assertContainsOnlyInstancesOf(Eloquent\Collection::class, $data);
    }

    /**
     * Test for request /profile with
     * user not having an authentication
     */
    public function testAuth()
    {
        $this->visit("/profile")
            ->seePageIs("/login");


    }

    /*
     * Test an insertion of submitted data
     * to the submissions table using
     * the model submission
     */
    public function testModelUser()
    {
        $submission = new submission();
        $submission->submitterEmail = "12345mahi@gmail.com";
        $submission->diseaseName = "common cold";
        $submission->remedyName = "gingery";
        $submission->description = "Is ginger a cure for common cold";
        $submission->category = "Respiratory";
        $submission->votes = 0;
        $submission->debunkedDescription = "not debunked";
        $submission->status = "not";
        $submission->save();

        $this->seeInDatabase('submissions', ['description' => 'Is ginger a cure for common cold']);
    }

    /**
     * Test for request /profile with
     * a user having an authentication
     */
    public function testWithAuth()
    {
        $user = factory(User::class)->make();
        $this->actingAs($user)
            ->withSession(['session' => 'value'])
            ->visit("/profile")
            ->seePageIs("/profile");
    }

    /*
     * Test that a if a submitted remedy does not
     *  exit it returns that the submitted remedy
     * is not in the database
     */
    public function testSubmissionViewPageFail(){
        $this->visit('/submissionViewPage?name=kesher')
            ->see('Remedy kesher is not found!');
    }
    /*
     * Test that a if a submitted remedy exit
     * it returns the detailed view of the submitted
     * remedy
     */
    public function testSubmissionViewPageSuccess(){
        $this->visit('/submissions')
            ->click('garlic')
            ->see('Comments');
    }

}
