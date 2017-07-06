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
 * This class is intended to test that a profile page is provided
 * to the professional after login.
 * This profile page includes the information of the professional 
 * as well as a debunk button to  
 */
public class ProvideProfilePageTest {
 
    private static WebDriver driver; //driver variable
    
   private static WebElement username, password, outputDiv, loginLink, errorTag; //required web elements for testing
   private static String profUsername, profPassword;
   private static Professional professional; //the professional object that the test class uses to log in with
      @BeforeClass
    public static void setup() //sets up the fixture by opening a network connection and setting the variables' values
    {
         System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");//set property for driver
         driver= new ChromeDriver();
         driver.get("http://localhost:8000");
         makeNewProfessional();
         
    }
    
    private static void makeNewProfessional(){ //creates a new professional after prompting the user
        String un, pw;
        Scanner input = new Scanner(System.in);
        System.out.print("Enter your user name: "); //prompts  the user for his/het username
        un = input.nextLine();
        System.out.print("Enter your password: ");//prompt the user for his/her password
        pw = input.nextLine();
        Professional pro = new Professional(un, pw);
        ProvideProfilePageTest.professional = pro; //sets the new professional to the professional variable of this class
    }
    
    
    @Test
    public void testProvidePofilePageFunctionality()
    {
        
        System.out.println("Begining test: "+ new Object(){}.getClass().getEnclosingMethod());
        
        //attempts to go to the page below
        try{
        loginLink = driver.findElement(By.xpath("//html/body/div/div[1]/a[3]")); //attempts to find the link that will navigate to the login page
        }
        catch(ElementNotFoundException e){out.println(e);}
        loginLink.click(); //clicks the login link in order to navigate there
   
      
        try{
        username = driver.findElement(By.name("email")); //attempts to find the username input web element
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        password = driver.findElement(By.name("password")); //attempts to find the password input web element
        }
        catch(ElementNotFoundException e){out.println(e);}
                
        username.sendKeys(ProvideProfilePageTest.professional.getUserName()); //sends the username data to the password input
        password.sendKeys(ProvideProfilePageTest.professional.getPassWord()); //sends the password to the password input
        
        password.submit(); //submits the form
        
               
        out.println(driver.getCurrentUrl().toString());
        outputDiv =driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[3]")); //the element that contains the value to be checked for confirming the test
        
        Assert.assertEquals(outputDiv.getText(), "E-mail: "+professional.getUserName()); //checks if the email used to login is provided in the profile page
        System.out.println("Finished test: "+new Object(){}.getClass().getEnclosingMethod());
        
        
    }
    
    @AfterClass
    public static void tearDown(){
         
         driver.close(); //navigate to the hosted site that goes to the 
         
         
    }
    
}
