/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ayatetest;

import java.util.Scanner;
import static java.lang.System.out;
import org.junit.runner.JUnitCore;
import org.junit.runner.Result;
import static org.junit.runner.Request.classes;
import org.openqa.selenium.WebDriver;
import org.junit.runner.notification.Failure;


/**
 *
 * @author arsem
 * 
 * This class is runs all the tests
 */
public class AyateTest {

    /**
     * @param args the command line arguments
     */
    static String uName;
        static String pass;
    
    public static WebDriver driver;
     public static void main(String[] args) {
        
        Result result = JUnitCore.runClasses(TestSuite.class); //runs the test suite which contains the test cases
        for (Failure failure : result.getFailures()) {
        System.out.println(failure.toString());
    }
        
        System.out.println(result.wasSuccessful());
    }
    
}
    
    

