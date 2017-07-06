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
 * This class is intended to test that is able to change his/her profile
 * The change should then be checked in the profile page 
 */
public class ProfileChangeTest {
 
    private static WebDriver driver; //driver variable
    
   private static WebElement username, password, outputDiv, loginLink, settingsLink, errorTag; //required web elements for testing
   private static WebElement changeNameInput, changeEmailInput, changePhoneInput, changeWorkAddressInput, changeOccupationInput, changeExperienceInput; //holds the form input elements
   private static String changeNameValue, changeEmailValue, changePhoneValue, changeWorkAddressValue, changeOccupationValue, changeExperienceValue;   
   private static Professional professional; //the professional object that the test class uses to log in with
   private static String[] priorData, subsequentData;   //professional profile info holders before and after the te change respectively
   @BeforeClass
    public static void setup() //sets up the fixture by opening a network connection and setting the variables' values
    {
         System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");//set property for driver
         driver= new ChromeDriver();
         driver.get("http://localhost:8000");
         makeNewProfessional();
         
         changeNameValue = "Arisema Mezgebe";
         changeEmailValue = "arisemamm@gmail.com";
         changeWorkAddressValue = "Bahir Dar";
         changeOccupationValue = "Student at Addis Ababa University";
         changeExperienceValue = "20 years of common home remedy relief witness.";
         
         
          
    }
    
    private static String[] scrapeInfo(String[] holder){ //returns information of the professional user after scrapping in a string array format
        
        WebElement nameValue = null, emailValue = null, phoneValue = null, workAddressValue = null, occupationValue = null; // hold the webelements that contain the information
        try{
        nameValue = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[2]")); //attempts to find the name information holder
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        emailValue = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[2]")); //attempts to find the name information holder
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        phoneValue = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[2]")); //attempts to find the name information holder
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        workAddressValue = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[2]")); //attempts to find the name information holder
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        occupationValue = driver.findElement(By.xpath("//*[@id=\"app\"]/div/div/div[1]/div/div[2]/div/div[2]")); //attempts to find the name information holder
        }
        catch(ElementNotFoundException e){out.println(e);}
        
        //Set the scrped data to the corresponding 
        try{
        holder = new String[] {nameValue.getText(), emailValue.getText(), phoneValue.getText(), workAddressValue.getText(), occupationValue.getText()};
        }
        catch(NullPointerException e){driver.navigate().refresh();}
        return holder;
    }
    
    private static void makeNewProfessional(){ //creates a new professional after prompting the user
        String un, pw;
        Scanner input = new Scanner(System.in);
        System.out.print("Enter your user name: "); //prompt twitter username
        un = input.nextLine();
        System.out.print("Enter your password: ");//prompt twitter password
        pw = input.nextLine();
        Professional pro = new Professional(un, pw);
        ProfileChangeTest.professional = pro; //sets the new professional to the professional variable of this class
    }
    
    
    @Test
    public void testPofileChangeFunctionality()
    {
        
        System.out.println("Begining test: "+ new Object(){}.getClass().getEnclosingMethod());
        
        //attempts to go to the page below
        try{
        loginLink = driver.findElement(By.xpath("//html/body/div/div[1]/a[3]")); //attempts to find the link that will navigate to the submissions page
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
                
        username.sendKeys(ProfileChangeTest.professional.getUserName()); //sends the username data to the password input
        password.sendKeys(ProfileChangeTest.professional.getPassWord()); //sends the password to the password input
        
        password.submit(); //submits the form
        
        try{
            Thread.sleep(2000);
        } catch(Exception e){}
        
        scrapeInfo(priorData); //get outcome data       
        
        //Navigate to settings here
        
        try{
        settingsLink = driver.findElement(By.xpath("//*[@id=\"app-navbar-collapse\"]/ul[2]/li[1]/a")); //attempts to find the link that will navigate to the settings page
        }
        catch(ElementNotFoundException e){out.println(e);}
        settingsLink.click(); //clicks the settings link in order to navigate there
        
        //find settings form inputs       
        try{
        changeNameInput = driver.findElement(By.name("name")); //attempts to find the link that will navigate to the settings page
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        changeEmailInput = driver.findElement(By.name("email")); //attempts to find the link that will navigate to the settings page
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        changePhoneInput = driver.findElement(By.name("phone")); //attempts to find the link that will navigate to the settings page
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        changeWorkAddressInput = driver.findElement(By.name("workAddress")); //attempts to find the link that will navigate to the settings page
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        changeOccupationInput = driver.findElement(By.name("occupation")); //attempts to find the link that will navigate to the settings page
        }
        catch(ElementNotFoundException e){out.println(e);}
        try{
        changeExperienceInput = driver.findElement(By.name("experience")); //attempts to find the link that will navigate to the settings page
        }
        catch(ElementNotFoundException e){out.println(e);}
        
        //enter the datas to the corresponding input
        
        changeNameInput.sendKeys(changeNameValue);
        changeEmailInput.sendKeys(changeEmailValue);
        changePhoneInput.sendKeys(changePhoneValue);
        changeWorkAddressInput.sendKeys(changeWorkAddressValue);
        changeOccupationInput.sendKeys(changeOccupationValue);
        changeExperienceInput.sendKeys(changeExperienceValue);
        
        changeExperienceInput.submit(); //submit the form
        
        try{
            Thread.sleep(2000);
        } catch(Exception e){}
        
        scrapeInfo(subsequentData); //get outcome data
        
        Assert.assertNotEquals(priorData, subsequentData); //checks that the datas prior and subsequent data are not the same
        System.out.println("Finished test: "+new Object(){}.getClass().getEnclosingMethod());
        
        
    }
    
    @AfterClass
    public static void tearDown(){
         
         driver.close(); //navigate to the hosted site that goes to the 
         
         
    }
    
}
