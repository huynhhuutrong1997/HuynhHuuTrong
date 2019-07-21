/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Data;

import java.sql.*;
import javax.swing.*;

public class Connect {
    Connection conn; 
    public static Connection getConnect(){
        try {
            String URL = "jdbc:sqlserver://localhost:1433;databaseName=QuanLyBanMayTinh";
            String user = "sa";
            String  pass = "123456";
            Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
            Connection conn = DriverManager.getConnection(URL, user, pass);
            return conn;
        } catch (Exception e) {
            //JOptionPane.showMessageDialog(null,"Kết nối CSDL thất bại","Thông báo",1);
            return null;
        }
    }
   
    
     
}
