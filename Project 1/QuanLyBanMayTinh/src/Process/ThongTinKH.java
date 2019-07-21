/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.sql.*;
import javax.swing.*;
import Data.*;


public class ThongTinKH {
    public static Connection conn = Connect.getConnect();
    public static PreparedStatement pst = null;
    public static ResultSet rs= null;
//    public static Data.Connect connection = new  Data.Connect ();
    public static void InsertKH (String MaKH, String TenKH,String GioiTinh, String DiaChi, String SDT)
    {
        String sql ="Insert into KhachHang (MaKH, TenKH, Gioitinh, Diachi, SDT) values (?,?,?,?,?)";
        
        try {
            pst = conn.prepareStatement(sql);
            pst.setString(1, MaKH);
            pst.setString(2, TenKH);
            pst.setString(3, GioiTinh);
            pst.setString(4, DiaChi);
            pst.setString(5, SDT);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Thêm thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Thêm thất bại","Thông báo",1);
        }   
    }
    public static void UpdateKH(String MaKH1,String MaKH, String TenKH,String GioiTinh, String DiaChi, String SDT)
    {
        String sql="UPDATE KhachHang Set MaKH = '"+MaKH+"', TenKH = N'"+TenKH+"', Gioitinh = N'"+GioiTinh+"', Diachi =N'"+DiaChi+"', SDT ='"+SDT+"' where MaKH = '"+MaKH1+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Đã sửa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Sửa thất bại","Thông báo",1);
        }
    }
       public static void DeleteKH(String MaKH)
    {
        String sql ="DELETE FROM KhachHang where MaKH = '"+MaKH+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Xóa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Mã "+MaKH+" có thể được sữ dụng ở thực thể khác nên không thể xóa","Thông báo",1);
        }
    }
     
     
}
