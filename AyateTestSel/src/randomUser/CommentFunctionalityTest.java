/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package randomUser;

import com.gargoylesoftware.htmlunit.ElementNotFoundException;
import static java.lang.System.out;
import java.util.Scanner;
import org.junit.AfterClass;
import org.junit.Assert;
import org.junit.BeforeClass;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

/**
 *
 * @author arsem
 */
public class CommentFunctionalityTest {

/**
 *
 * @author arsem
 * 
 * The system a user should be able to comment on questions, answers and home remedies
 * This test class tests that functionality of our system
 * This will be done by navigating to one of the remedies in the submissions listing
 * and then filling the form that is supposed to comment after which 
 * We then check that the submitted
 */

    
   private static WebDriver driver; //driver variable
   private static WebElement homeLink, submissionsLink; //holds the specific link used to navigate to the submissions page
   private static WebElement selectedSubmission; //required submission that we are going to test the commenting capability on
   private static WebElement commentInput, commentNameInput, commentEmailInput, commentRateInput; //comment form input web elements 
   private static WebElement outputDiv; //element to check whether the test passes or not
   
   private static String comment, name, email; //the datas we will pass to the comment form to use in this test class
   private static Integer rate; //the datas we will pass to the comment form to use in this test class
      
   @BeforeClass
    public static void setup() //sets up the fixture by opening a network connection and declaring the values of the functions
    {
         System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");//set property for driver
         driver= new ChromeDriver();
         driver.get("http://localhost:8000");
         
         //sets the values of the variables below that will be used to enter into the form
         comment = "This is a test comment";
         name = "Tester";
         email = "test@tester.com";
         rate = 9;
         
    }
    
    /*
    *The getUsernameAndPassword function prompts the user for 
    *his/her username and password and data and then
    *sets it to the variables
    */
    
    @Test
    public void testCommentingFunctionality()
    {
        System.out.println("Begining test: "+ new Object(){}.getClass().getEnclosingMethod());
        
        //attempts to go to the home page below
        try{
        homeLink = driver.findElement(By.xpath("/html/body/div/div[1]/a[1]")); //attempts to find the link that will navigate to the submissions page
        }
        catch(ElementNotFoundException e){out.println(e);}
        homeLink.click(); //clicks the home link in order to navigate there        
        
        //attempts to go to the page below
        try{
        submissionsLink = driver.findElement(By.xpath("//*[@id=\"app-navbar-collapse\"]/ul[2]/li[1]/a")); //attempts to find the link that will navigate to the submissions page
        }
        catch(ElementNotFoundException e){out.println(e);}
        submissionsLink.click(); //clicks the submissions link in order to navigate there
        
        //finds a submission to select below
        try{
        selectedSubmission = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div/div/div[2]/div[1]/h4/a"));
        }
        catch(ElementNotFoundException e){out.println(e);}
        selectedSubmission.click(); //selects the submitted item to navigate to
        
        
        try{
        commentInput = driver.findElement(By.name("comment")); //find the comment input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        commentNameInput = driver.findElement(By.name("commentorName")); //find the name input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        commentEmailInput = driver.findElement(By.name("commentorEmail")); //find the email input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        commentRateInput = driver.findElement(By.name("rating")); //find the rate input
        }
        catch(ElementNotFoundException e){out.println(e);}
        
        commentInput.sendKeys(comment); //send comment to comment form
        commentNameInput.sendKeys(name); //send name to comment form
        commentEmailInput.sendKeys(email); //send email to comment form
        commentRateInput.sendKeys(rate.toString()); //send rate to comment form
                
        commentRateInput.submit(); //submit comment form
        
        outputDiv = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[2]/div[2]/p[2]"));
        
        
        Assert.assertNotNull(outputDiv);
        System.out.println("Finished test "+new Object(){}.getClass().getEnclosingMethod());
                
    }

    @AfterClass
    public static void tearDown(){
         
         driver.close(); //navigate to the hosted site that goes to the 
         
         
    }
    
}
