/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package professional;

import java.util.Scanner;

/**
 *
 * @author arsem
 * 
 * This class provides the Professional interface in a class structure
 * 
 * It is used primarily for accessing the username/password combo of the Professional that is logged in or is about to be logged in
 */
public class Professional {
 
    private String username;
    private String password;
    
    public Professional(String userName, String passWord){ //constructs the professional obj
        this.username = userName;
        this.password = passWord;
    }
    
    public String getUserName(){ //returns the username of type professional
        return username;
    }
    
    public String getPassWord(){ //returns the password
        return password; 
    }
    
    
}
