/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.sql.*;
import javax.swing.*;
import Data.*;

public class HoaDonBan {
    public static Connection conn = Connect.getConnect();
    public static PreparedStatement pst = null;
    public static ResultSet rs= null;
     public static void InsertHDB (String MaHDB, String MaNV,String MaKH, String MaMT, String SoLuong, 
                            String NgayBan, String DiaChi, String SDT, String GiaBan, String TongTien)
    {
        String sql ="Insert into HoaDonBan (MaHDB, MaNV, MaKH, MaMT, SoLuong, NgayBan, DiaChi, SDT, GiaBan, TongTien) values (?,?,?,?,?,?,?,?,?,?)";
        try {
            pst = conn.prepareStatement(sql);
            pst.setString(1, MaHDB);
            pst.setString(2, MaNV);
            pst.setString(3, MaKH);
            pst.setString(4, MaMT);
            pst.setString(5, SoLuong);
            pst.setString(6, NgayBan);
            pst.setString(7, DiaChi);
            pst.setString(8, SDT);
            pst.setString(9, GiaBan);
            pst.setString(10,TongTien);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Thêm thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Thêm thất bại","Thông báo",1);
        }   
    }
       public static void UpdateHDB(String MaHDB1,String MaHDB, String MaNV,String MaKH, String MaMT, String SoLuong, 
                            String NgayBan, String DiaChi, String SDT, String GiaBan, String TongTien)
    {
        String sql="UPDATE HoaDonBan Set MaHDB = '"+MaHDB+"', MaNV = '"+MaNV+"', MaKH = '"+MaKH+"', MaMT = '"+MaMT+"',SoLuong ='"+SoLuong+"', "
                + "NgayBan = '"+NgayBan+"',DiaChi = N'"+DiaChi+"',SDT = '"+SDT+"', GiaBan ='"+GiaBan+"', TongTien = '"+TongTien+"' where MaHDB = '"+MaHDB1+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Đã sửa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Sửa thất bại","Thông báo",1);
        }
    }
       public static void DeleteHDB(String MaHDB)
    {
        String sql ="DELETE FROM HoaDonBan where MaHDB = '"+MaHDB+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Xóa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Không thể xóa","Thông báo",1);
        }
    }
    
}
