/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.sql.*;
import javax.swing.*;
import Data.*;

public class ThongTinNV {
    public static Connection conn = Connect.getConnect();
    public static PreparedStatement pst = null;
    public static ResultSet rs= null;
    
    public static void InsertNV (String MaNV, String TenNV,String GioiTinh, String DiaChi, String SDT)
    {
        String sql ="Insert into NhanVien (MaNV, TenNV, Gioitinh, Diachi, SDT) values (?,?,?,?,?)";
        try {
            pst = conn.prepareStatement(sql);
            pst.setString(1, MaNV);
            pst.setString(2, TenNV);
            pst.setString(3, GioiTinh);
            pst.setString(4, DiaChi);
            pst.setString(5, SDT);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Thêm thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Thêm thất bại","Thông báo",1);
        }   
    }
    public static void UpdateNV(String MaNV1,String MaNV, String TenNV,String GioiTinh, String DiaChi, String SDT)
    {
        String sql="UPDATE NhanVien Set MaNV = '"+MaNV+"', TenNV = N'"+TenNV+"', Gioitinh = N'"+GioiTinh+"', Diachi =N'"+DiaChi+"', SDT ='"+SDT+"' where MaNV = '"+MaNV1+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Đã sửa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Sửa thất bại","Thông báo",1);
        }
    }
       public static void DeleteNV(String MaNV)
    {
        String sql ="DELETE FROM NhanVien where MaNV = '"+MaNV+"'";
        try {
            pst = conn.prepareStatement(sql);
            pst.execute();
            JOptionPane.showMessageDialog(null,"Xóa thành công","Thông báo",1);
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null,"Không thể xóa","Thông báo",1);
        }
    }
    
}
