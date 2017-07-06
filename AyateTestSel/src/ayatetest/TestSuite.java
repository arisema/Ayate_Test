/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ayatetest;



/**
 *
 * @author arsem
 */

import org.junit.runner.RunWith;
import org.junit.runners.Suite;


@RunWith(Suite.class)
@Suite.SuiteClasses({
    professional.RegisteringTest.class,    //adds the register a professional functionality test class
    professional.ProvideProfilePageTest.class, //adds the Procide profile page test class
    randomUser.CommentFunctionalityTest.class, //adds the commenting functionality test class
    randomUser.SubmissionSearchTest.class, //adds the submission searching functionality test class
    randomUser.RemedySearchTest.class //adds the remedy searching functionality test class 
    
    
})
public class TestSuite {
}
