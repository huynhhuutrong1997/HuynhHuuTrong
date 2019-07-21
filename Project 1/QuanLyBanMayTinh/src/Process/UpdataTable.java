/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.sql.*;
import javax.swing.*;
import Data.*;
import net.proteanit.sql.*;
public class UpdataTable {
    public static PreparedStatement pst=null;//biến thực thi sql
    public static ResultSet rs = null;// kết quả trả về dạng 1 bảng hay 1 dòng dữ liệu
    public static Connection conn = Connect.getConnect(); //lấy từ lớp cơ bản kết nối data
    
    public static void LoadData(String sql, JTable tb)
    {
        try {
            pst=conn.prepareStatement(sql);
            rs = pst.executeQuery();
            tb.setModel(DbUtils.resultSetToTableModel(rs));
            //ngay chổ này là nạp dữ liệu lên bảng mà mình truyền vào
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e,"Thông báo lỗi",1);
        }
    }
    // tiếp theo ta viết 1 hàm đỗ 1 dòng dữ liệu từ bảng lên textfield
    public static ResultSet ShowTextField(String sql)
    {
        try {
            
            pst = conn.prepareStatement(sql);
            return pst.executeQuery();
            ////trả về 1 dòng dữ liệu đọc được
        } catch (Exception e) {
            return null;
            //JOptionPane.showConfirmDialog(null, e,"Thông báo lỗi",1);
            //với Java tất cả mọi thứ điều nằm vào try catch, ban nên lưu ý điều này
        }
    }
    
}

