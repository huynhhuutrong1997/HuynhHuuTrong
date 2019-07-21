/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.sql.*;
import javax.swing.*;
import Data.*;

public class ThongTinMT {
    public static Connection conn = Connect.getConnect();
    public static PreparedStatement pst = null;
    public static ResultSet rs= null;
    
      public static void InsertMT (String MaMT, String TenMT,String MaNCC, String SL, String GiaBan, String GiaNhap)
    {
        String sql ="Insert into ThongTinMayTinh (MaMT, TenMT, MaNCC, SoLuong, GiaBan, GiaNhap) values (?,?,?,?,?,?)";
        try {
            pst = conn.prepareStatement(sql);
            pst.setString(1, MaMT);
            pst.setString(2, TenMT);
            pst.setString(3, MaNCC);
            pst.setString(4,SL);
            pst.setString(5,GiaBan);
            pst.setString (6,GiaNhap);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Thêm thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Thêm thất bại","Thông báo",1);
        }   
    }
       public static void UpdateMT(String MaMT1,String MaMT, String TenMT,String MaNCC, String SL, String GiaBan, String GiaNhap)
    {
        String sql="UPDATE ThongTinMayTinh Set MaMT = '"+MaMT+"', TenMT = N'"+TenMT+"', MaNCC = '"+MaNCC+"', SoLuong ='"+SL+"', GiaBan ='"+GiaBan+"', GiaNhap ='"+GiaNhap+"' where MaMT = '"+MaMT1+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Đã sửa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Sửa thất bại","Thông báo",1);
        }
    }
       public static void DeleteMT(String MaMT)
    {
        String sql ="DELETE FROM ThongTinMayTinh where MaMT = '"+MaMT+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Xóa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Không thể xóa","Thông báo",1);
        }
    }
}
