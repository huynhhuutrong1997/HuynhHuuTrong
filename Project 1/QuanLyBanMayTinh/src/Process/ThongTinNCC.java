/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.sql.*;
import javax.swing.*;
import Data.*;

public class ThongTinNCC {
    public static Connection conn = Connect.getConnect();
    public static PreparedStatement pst = null;
    public static ResultSet rs= null;
    
    public static void InsertNCC (String MaNCC, String TenNCC,String DiaChi, String SDT)
    {
        String sql ="Insert into NhaCungCap (MaNCC, TenNCC, DiaChi, SDT) values (?,?,?,?)";
        try {
            pst = conn.prepareStatement(sql);
            pst.setString(1, MaNCC);
            pst.setString(2, TenNCC);
            pst.setString(3, DiaChi);
            pst.setString(4,SDT);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Thêm thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Thêm thất bại","Thông báo",1);
        }   
    }
       public static void UpdateNCC(String MaNCC1,String MaNCC, String TenNCC,String DiaChi, String SDT)
    {
        String sql="UPDATE NhaCungCap Set MaNCC = '"+MaNCC+"', TenNCC = N'"+TenNCC+"', Diachi= N'"+DiaChi+"', SDT ='"+SDT+"'where MaNCC = '"+MaNCC1+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Đã sửa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Sửa thất bại","Thông báo",1);
        }
    }
       public static void DeleteNCC(String MaNCC)
    {
        String sql ="DELETE FROM NhaCungCap where MaNCC = '"+MaNCC+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Xóa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Không thể xóa","Thông báo",1);
        }
    }
    
}
