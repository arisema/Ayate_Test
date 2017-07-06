/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package randomUser;


import com.gargoylesoftware.htmlunit.ElementNotFoundException;
import static java.lang.System.out;
import java.util.ArrayList;
import java.util.List;
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
public class SubmissionSearchTest {
 
/**
 *
 * @author arsem
 * 
 * This class is aimed at testing the searching functionality
 * of out system.
 * 
 */

    
   private static WebDriver driver; //driver variable
   private static WebElement searchInput, outputDiv; //required web elements for testing
   private static WebElement homeLink, submissionsLink; //holds the link of the page we want to navigate to, in this case submissions
   
      @BeforeClass
    public static void setup() //sets up the fixture by opening a network connection
    {
         System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");//set property for driver
         driver= new ChromeDriver();
         driver.get("http://localhost:8000"); //goes to the hosted site which is the system that we want to test
         
         
    }

    @Test
    public void testSubmissionSearchingFunctionality()
    {
        System.out.println("Begining test: "+ new Object(){}.getClass().getEnclosingMethod());
        String  searchItem="Sour delight";
        
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
        
        try{
        searchInput = driver.findElement(By.name("search")); //attempts to find the search input
        }
        catch(ElementNotFoundException e){out.println(e);}
        searchInput.sendKeys(searchItem); //sends the item to search to the search input
        
        searchInput.submit();
        
        outputDiv =driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div/div/div[2]/div[1]/div"));//finds the search results
        
        
        Assert.assertNotNull(outputDiv); //if search results are not displayed this test has failed
        System.out.println("Finished test "+new Object(){}.getClass().getEnclosingMethod());
                
    }

    @AfterClass
    public static void tearDown(){
         
         driver.close(); //navigate to the hosted site that goes to the 
         
         
    }
    
}
