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
public class RemedySearchTest {
 
/**
 *
 * @author arsem
 * 
 * This class is aimed at testing the remedy searching functionality
 * of out system.
 * 
 */

    
   private static WebDriver driver; //driver variable
   private static WebElement searchInput, outputDiv, primaryView; //required web elements for testing
   private static WebElement homeLink; //holds the web element that is used to navigate to the page to be tested
   
      @BeforeClass
    public static void setup() //sets up the fixture by opening a network connection
    {
         System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");//set property for driver
         driver= new ChromeDriver();
         driver.get("http://localhost:8000"); //navigate to the hosted site that goes to the 
         
         
    }

    @Test
    public void testRemedySearchingFunctionality()
    {
        System.out.println("Begining test: "+ new Object(){}.getClass().getEnclosingMethod());
        String  searchItem="Sour delight";
        
        try{
        homeLink = driver.findElement(By.xpath("/html/body/div/div[1]/a[1]")); //attempts to find the link that will navigate to the submissions page
        }
        catch(ElementNotFoundException e){out.println(e);}
        homeLink.click(); //clicks the home link in order to navigate there
        
        try{
        searchInput = driver.findElement(By.id("search")); //attempts to find the search input tag
        }
        catch(ElementNotFoundException e){out.println(e);}
        
        try{
        primaryView = driver.findElement(By.id("heading")); //attempts to find the default page content holder to compare the contents with the contents after the search
        }
        catch(ElementNotFoundException e){out.println(e);}
        
        try{
        outputDiv = driver.findElement(By.id("heading")); //contains the search results
        }
        catch(ElementNotFoundException e){out.println(e);}
       
        searchInput.sendKeys(searchItem); //sends the item to search to the search input
        
        searchInput.click();
        
        
        
        
        Assert.assertNotEquals(primaryView.getText(), outputDiv.getText()); //if search results are not displayed this test has failed
        System.out.println("Finished test "+new Object(){}.getClass().getEnclosingMethod());
        
        
    }
    
    @AfterClass
    public static void tearDown(){
         
         driver.close(); //navigate to the hosted site that goes to the 
         
         
    }
    
}
