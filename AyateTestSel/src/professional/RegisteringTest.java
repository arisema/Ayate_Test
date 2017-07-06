/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package professional;

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
 * 
 * The user requests an account that gives him/her the privilege of being professional user. 
 * The system will provide the user with a form to be filled.
 * This test class tests that the user is provided with a registration form upon the submission
 * of which it checks that the user has been logged in with the information submitted by checking
 * that a profile page has been provided to the user.
 */
public class RegisteringTest {
 
   private static WebDriver driver; //driver variable
   private static WebElement fullnameInput, occupationInput, workAddressInput, qualificationInput, 
           genderInput, phoneNumberInput, emailInput, passwordInput, confirmPasswordInput;  //required web elements for testing
   private static WebElement outputDiv, homeLink, registerLink; //the web element that is checked to assert this test class
   private static String fullName, occupation, workAddress, qualification, email, password;
   private static Integer phoneNumber;
      @BeforeClass
    public static void setup() //sets up the fixture by opening a network connection and defining the values of the variables
    {
         System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");//set property for driver
         driver= new ChromeDriver();
         driver.get("http://localhost:8000");
         
         fullName = "Mahder Haileslasse";
         occupation = "Tester";
         workAddress = "Tester Suite Class";
         qualification = "Suite Class";
         phoneNumber = 251453729;
         email = "tester@testsuite.com";
         password = "tester";
    }
    
    
    
  
    
    @Test
    public void testRegisteringForAnAccountFunctionality()
    {
        
        System.out.println("Begining test: "+ new Object(){}.getClass().getEnclosingMethod());
        
        //attempts to go to the home page below
        try{
        homeLink = driver.findElement(By.xpath("/html/body/div/div[1]/a[1]")); //attempts to find the link that will navigate to the submissions page
        }
        catch(ElementNotFoundException e){out.println(e);}
        homeLink.click(); //clicks the home link in order to navigate there 
        
        //attempts to go to the register page below
        try{
        registerLink = driver.findElement(By.xpath("//*[@id=\"app-navbar-collapse\"]/ul[2]/li[3]/a")); //attempts to find the link that will navigate to the submissions page
        }
        catch(ElementNotFoundException e){out.println(e);}
        registerLink.click(); //clicks the login link in order to navigate there//navigates to the registration page
         
        
     //makes the new professional class that would be input to this test section
        try{
        fullnameInput = driver.findElement(By.name("name")); //find full name input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        occupationInput = driver.findElement(By.name("occupation")); //find occupation input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        workAddressInput = driver.findElement(By.name("workAddress")); //find work address input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        qualificationInput = driver.findElement(By.name("qualification")); //find qualification input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        genderInput = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div/div/div[2]/form/div[5]/div/input[1]")); //find gender input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        phoneNumberInput = driver.findElement(By.name("phone")); //find phone number input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        emailInput = driver.findElement(By.name("email")); //find email input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        passwordInput = driver.findElement(By.name("password")); //find password input
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        confirmPasswordInput = driver.findElement(By.name("password_confirmation")); //find confirm password input
        }
        catch(ElementNotFoundException e){out.println(e);}
        
        fullnameInput.sendKeys(fullName); //sends the full name data to the full name input
        occupationInput.sendKeys(occupation); //sends the occupation data to the occupation input
        workAddressInput.sendKeys(workAddress); //sends the work address datat to the work address input
        qualificationInput.sendKeys(qualification); //sends the qualification data to the qualification input
        genderInput.click(); //provides the gender radio buttond
        phoneNumberInput.sendKeys(phoneNumber.toString()); //sends the phone number data to the phone number input
        emailInput.sendKeys(email);  //sends the email data to the email input
        passwordInput.sendKeys(password); //sends the password data to the password input
        confirmPasswordInput.sendKeys(password); //sends the same password data to the confirm password input
        
        confirmPasswordInput.submit(); //submits the form
        
        outputDiv =driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[3]"));
        
        Assert.assertEquals(outputDiv.getText(), "E-mail: "+email);
        System.out.println("Finished test: "+new Object(){}.getClass().getEnclosingMethod());
        
        
    }
    
    @AfterClass
    public static void tearDown(){
         
         driver.close(); //navigate to the hosted site that goes to the 
         
         
    }
}
