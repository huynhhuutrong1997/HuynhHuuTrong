/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.sql.*;
import javax.swing.*;
import Data.*;

public class HoaDonNhap {
     public static Connection conn = Connect.getConnect();
    public static PreparedStatement pst = null;
    public static ResultSet rs= null;
     public static void InsertHDN (String MaHDN, String MaNV,String MaMT, String MaNCC, String SoLuong, 
                            String NgayNhap, String DiaChi, String SDT, String GiaNhap, String TongTien)
    {
        String sql ="Insert into HoaDonNhap (MaHDN, MaNV, MaMT, MaNCC, SoLuong, NgayNhap, DiaChi, SDT, GiaNhap, TongTien) values (?,?,?,?,?,?,?,?,?,?)";
        try {
            pst = conn.prepareStatement(sql);
            pst.setString(1, MaHDN);
            pst.setString(2, MaNV);
            pst.setString(3, MaMT);
            pst.setString(4, MaNCC);
            pst.setString(5, SoLuong);
            pst.setString(6, NgayNhap);
            pst.setString(7, DiaChi);
            pst.setString(8, SDT);
            pst.setString(9, GiaNhap);
            pst.setString(10,TongTien);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Thêm thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Thêm thất bại","Thông báo",1);
        }   
    }
       public static void UpdateHDN(String MaHDN1,String MaHDN, String MaNV,String MaMT, String MaNCC, String SoLuong, 
                            String NgayNhap, String DiaChi, String SDT, String GiaNhap, String TongTien)
    {
        String sql="UPDATE HoaDonNhap Set MaHDN = '"+MaHDN+"', MaNV = '"+MaNV+"', MaMT = '"+MaMT+"', MaNCC = '"+MaNCC+"',SoLuong ='"+SoLuong+"', "
                + "NgayNhap = '"+NgayNhap+"', DiaChi = N'"+DiaChi+"',SDT = '"+SDT+"', GiaNhap ='"+GiaNhap+"', TongTien = '"+TongTien+"' where MaHDN = '"+MaHDN1+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Đã sửa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Sửa thất bại","Thông báo",1);
        }
    }
       public static void DeleteHDN(String MaHDN)
    {
        String sql ="DELETE FROM HoaDonNhap where MaHDN = '"+MaHDN+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Xóa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Không thể xóa","Thông báo",1);
        }
    }
}
