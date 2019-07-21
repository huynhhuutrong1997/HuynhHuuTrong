/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Main;

import Data.*;
import java.sql.*;
import javax.swing.*;
import Process.*;


public class jfrmQuanLyBanMT extends javax.swing.JFrame {

    
//Biến Load data bảng thông tin MT
    public static String sqlMT ="SELECT MaMT as 'Mã máy tính', TenMT as 'Tên máy tính', MaNCC as 'Mã nhà cung cấp', Soluong as 'Số lượng', Giaban as 'Giá bán', Gianhap as 'Giá nhập'"
            + " FROM ThongTinMayTinh order by MaMT asc; ";
    public static String MaMT;//biến này lưu tạm mã MT khi nhấn lên 1 dòng trong bảng phục vụ cho hàm Update và Delete
//  Biến load data bảng thông tin NV
    public static String sqlNV = "SELECT MaNV as 'Mã nhân viên', TenNV as 'Tên nhân viên', Gioitinh as 'Giới tính', Diachi as 'Địa chỉ', SDT as 'Số điện thoại'"
            + " FROM NhanVien order by MaNV asc; ";
    public static String MaNV;
 //  Biến load data bảng thông tin KH
    public static String sqlKH = "SELECT MaKH as 'Mã khách hàng', TenKH as 'Tên khách hàng', Gioitinh as 'Giới tính', Diachi as 'Địa chỉ', SDT as 'Số điện thoại'"
            + " FROM KhachHang order by MaKH asc; ";
    public static String MaKH;
//Biến load data bảng HDB
    public static String sqlHDB = "SELECT MaHDB as 'Mã hóa đơn', MaNV as 'Mã nhân viên',MaKH as 'Mã khách hàng',\n" +
"MaMT as 'Mã máy tính',Soluong as 'Số lượng',Ngayban as 'Ngày Bán' ,Diachi as 'Địa chỉ',SDT as 'Số điện thoại',Giaban as 'Giá bán', Tongtien as 'Tổng tiền' \n" +
"FROM HoaDonBan order by MaHDB asc;";
    public static String MaHDB;
 //Biến load data bảng HDN
    public static String sqlHDN = "SELECT MaHDN as 'Mã hóa đơn', MaNV as 'Mã nhân viên',MaNCC as 'Mã nhà cung cấp',\n" +
"MaMT as 'Mã máy tính',Soluong as 'Số lượng',Ngaynhap as 'Ngày Nhập' ,\n" +
"Diachi as 'Địa chỉ',SDT as 'Số điện thoại',Gianhap as 'Giá nhập', Tongtien as 'Tổng tiền'\n" +
"FROM HoaDonNhap order by MaHDN asc;";
    public static String MaHDN;
//Biến load data bảng NCC
    public static String sqlNCC ="SELECT MaNCC as 'Mã nhà cung cấp', TenNCC as 'Tên nhà cung cấp', Diachi as 'Địa chỉ', SDT as 'Số điện thoại'"
            + " FROM NhaCungCap order by MaNCC asc; ";
    public static String MaNCC;
    
    public jfrmQuanLyBanMT() {
        initComponents();
        showCT();
        
        //load data từ CSDL len combobox
        //Combobox NCC thông tin mt
        String sqlcbNCC = "SELECT * FROM NhaCungCap ";
        LoadDataCB(sqlcbNCC,this.cbMaNCC,"MaNCC");
        //Combobox MaNV hóa đơn bán
        String sqlcbMaNVHDB = "SELECT * FROM NhanVien ";
        LoadDataCB(sqlcbMaNVHDB,this.cbMaNVHDB,"MaNV");
        //Combobox MaKH hóa đơn bán
        String sqlcbMaKHHDB = "SELECT * FROM KhachHang ";
        LoadDataCB(sqlcbMaKHHDB,this.cbMaKHHDB,"MaKH");
        //Combobox MaMT hóa đơn bán
        String sqlcbMaMTHDB = "SELECT * FROM ThongTinMayTinh ";
        LoadDataCB(sqlcbMaMTHDB,this.cbMaMTHDB,"MaMT");
         //Combobox MaNV hóa đơn bán
        String sqlcbMaNVHDN = "SELECT * FROM NhanVien ";
        LoadDataCB(sqlcbMaNVHDN,this.cbMaNVHDN,"MaNV");
        //Combobox MaKH hóa đơn bán
        String sqlcbMaNCCHDN = "SELECT * FROM Nhacungcap ";
        LoadDataCB(sqlcbMaNCCHDN,this.cbMaNCCHDN,"MaNCC");
        //Combobox MaMT hóa đơn bán
        String sqlcbMaMTHDN = "SELECT * FROM ThongTinMayTinh ";
        LoadDataCB(sqlcbMaMTHDN,this.cbMaMTHDN,"MaMT");
        //Thông tin MT
        this.btSua.setEnabled(false);
        this.btXoa.setEnabled(false);
        //Thông tin NV
        this.btSuaNV.setEnabled(false);
        this.btXoaNV.setEnabled(false);
        //Thông tin KH
        this.btSuaKH.setEnabled(false);
        this.btXoaKH.setEnabled(false);
        //Hóa đơn bán
        this.btSuaHDB.setEnabled(false);
        this.btXoaHDB.setEnabled(false);
        //Hóa đơn nhập
        this.btSuaHDN.setEnabled(false);
        this.btXoaHDN.setEnabled(false);
       //Thông tin NCC
        this.btSuaNCC.setEnabled(false);
        this.btXoaNCC.setEnabled(false);
    }
     public void showCT()
    {
        UpdataTable.LoadData(sqlMT, tbThongTinMT);//load data bảng thông tin MT
        UpdataTable.LoadData(sqlNV, tbNV);// load data bảng thông tin NV
        UpdataTable.LoadData(sqlKH, tbKH);// load data bảng thông tin NV
        UpdataTable.LoadData(sqlHDB, tbHDB);// load data bảng hóa đơn bán
        UpdataTable.LoadData(sqlHDN, tbHDN);// load data bảng hóa đơn bán
        UpdataTable.LoadData(sqlNCC, tbNCC);//Load data bảng NCC
    }
     
//     public void ProcessCrt(boolean b)
//    {
//      //button thông tin MT
//        
//        this.btSua.setEnabled(b);
//        this.btXoa.setEnabled(b);
//        
//    }
     //load CSDL len combobox
    public static Connection conn = Connect.getConnect();
    public void LoadDataCB(String sql, JComboBox cb, String bien)
     {
         try {
             PreparedStatement pst = conn.prepareStatement(sql);
             ResultSet rs = pst.executeQuery();
             while(rs.next())
             {
                 cb.addItem(rs.getString(bien));
             }
         } catch (Exception e) {
             
         }
     }
    //load data combobox lên textfield
     public void LoadCB(String sql, JComboBox cb,JTextField tf, String bien)
     {
         
          try {
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1,(String)cb.getSelectedItem());
            ResultSet rs = pst.executeQuery();
            while (rs.next())
            {
                tf.setText(rs.getString(bien));
            }
        } catch (Exception e) {
        }
     }
     

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        buttonGroup1 = new javax.swing.ButtonGroup();
        buttonGroup2 = new javax.swing.ButtonGroup();
        tpQuanLy = new javax.swing.JTabbedPane();
        tpSanPham = new javax.swing.JTabbedPane();
        pThongTinMT = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tbThongTinMT = new javax.swing.JTable();
        btThem = new javax.swing.JButton();
        btSua = new javax.swing.JButton();
        btXoa = new javax.swing.JButton();
        txtMaMT = new javax.swing.JTextField();
        txtTenMT = new javax.swing.JTextField();
        txtMaNCCMT = new javax.swing.JTextField();
        txtSoLuong = new javax.swing.JTextField();
        txtGiaBan = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        txtTim = new javax.swing.JTextField();
        btTim = new javax.swing.JButton();
        btLamMoi = new javax.swing.JButton();
        jLabel8 = new javax.swing.JLabel();
        cbMaNCC = new javax.swing.JComboBox<>();
        jLabel50 = new javax.swing.JLabel();
        txtGiaNhap = new javax.swing.JTextField();
        jTPNhanVien = new javax.swing.JTabbedPane();
        jPanel1 = new javax.swing.JPanel();
        jLabel7 = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        jLabel10 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        jLabel13 = new javax.swing.JLabel();
        jLabel14 = new javax.swing.JLabel();
        txtMaNV = new javax.swing.JTextField();
        txtTenNV = new javax.swing.JTextField();
        txtGioiTinhNV = new javax.swing.JTextField();
        txtDiaChiNV = new javax.swing.JTextField();
        txtSDTNV = new javax.swing.JTextField();
        txtTimNV = new javax.swing.JTextField();
        btLamMoiNV = new javax.swing.JButton();
        btThemNV = new javax.swing.JButton();
        btSuaNV = new javax.swing.JButton();
        btXoaNV = new javax.swing.JButton();
        btTimNV = new javax.swing.JButton();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbNV = new javax.swing.JTable();
        jTPKhachHang = new javax.swing.JTabbedPane();
        jPanel2 = new javax.swing.JPanel();
        jLabel15 = new javax.swing.JLabel();
        txtMaKH = new javax.swing.JTextField();
        jLabel16 = new javax.swing.JLabel();
        jLabel17 = new javax.swing.JLabel();
        txtTenKH = new javax.swing.JTextField();
        txtGioiTinhKH = new javax.swing.JTextField();
        jLabel18 = new javax.swing.JLabel();
        btLamMoiKH = new javax.swing.JButton();
        btThemKH = new javax.swing.JButton();
        btSuaKH = new javax.swing.JButton();
        txtSDTKH = new javax.swing.JTextField();
        txtDiaChiKH = new javax.swing.JTextField();
        jLabel19 = new javax.swing.JLabel();
        jLabel20 = new javax.swing.JLabel();
        jLabel21 = new javax.swing.JLabel();
        txtTimKH = new javax.swing.JTextField();
        btTimKH = new javax.swing.JButton();
        btXoaKH = new javax.swing.JButton();
        jScrollPane3 = new javax.swing.JScrollPane();
        tbKH = new javax.swing.JTable();
        jTPHoaDon = new javax.swing.JTabbedPane();
        jPanel3 = new javax.swing.JPanel();
        jLabel22 = new javax.swing.JLabel();
        jLabel23 = new javax.swing.JLabel();
        jLabel24 = new javax.swing.JLabel();
        txtMaHDB = new javax.swing.JTextField();
        txtMaNVHDB = new javax.swing.JTextField();
        txtMaKHHDB = new javax.swing.JTextField();
        jLabel25 = new javax.swing.JLabel();
        jLabel26 = new javax.swing.JLabel();
        jLabel27 = new javax.swing.JLabel();
        txtMaMTHDB = new javax.swing.JTextField();
        txtSoLuongHDB = new javax.swing.JTextField();
        txtNgayBan = new javax.swing.JTextField();
        jLabel28 = new javax.swing.JLabel();
        jLabel29 = new javax.swing.JLabel();
        jLabel30 = new javax.swing.JLabel();
        txtDiaChiHDB = new javax.swing.JTextField();
        txtSDTHDB = new javax.swing.JTextField();
        txtGiaBanHDB = new javax.swing.JTextField();
        jLabel31 = new javax.swing.JLabel();
        txtTongTienHDB = new javax.swing.JTextField();
        jLabel32 = new javax.swing.JLabel();
        txtTimHDB = new javax.swing.JTextField();
        btLamMoiHDB = new javax.swing.JButton();
        btThemHDB = new javax.swing.JButton();
        btSuaHDB = new javax.swing.JButton();
        btXoaHDB = new javax.swing.JButton();
        btTimHDB = new javax.swing.JButton();
        jScrollPane4 = new javax.swing.JScrollPane();
        tbHDB = new javax.swing.JTable();
        cbMaNVHDB = new javax.swing.JComboBox<>();
        cbMaKHHDB = new javax.swing.JComboBox<>();
        cbMaMTHDB = new javax.swing.JComboBox<>();
        jPanel4 = new javax.swing.JPanel();
        jLabel33 = new javax.swing.JLabel();
        jLabel34 = new javax.swing.JLabel();
        txtMaHDN = new javax.swing.JTextField();
        txtMaNVHDN = new javax.swing.JTextField();
        jLabel35 = new javax.swing.JLabel();
        jLabel36 = new javax.swing.JLabel();
        txtTongTienHDN = new javax.swing.JTextField();
        txtMaMTHDN = new javax.swing.JTextField();
        jLabel37 = new javax.swing.JLabel();
        jLabel38 = new javax.swing.JLabel();
        jLabel39 = new javax.swing.JLabel();
        txtMaNCCHDN = new javax.swing.JTextField();
        txtSoLuongHDN = new javax.swing.JTextField();
        txtNgayNhap = new javax.swing.JTextField();
        jLabel40 = new javax.swing.JLabel();
        jLabel41 = new javax.swing.JLabel();
        jLabel42 = new javax.swing.JLabel();
        txtDiaChiHDN = new javax.swing.JTextField();
        txtSDTHDN = new javax.swing.JTextField();
        txtGiaNhapHDN = new javax.swing.JTextField();
        txtTimHDN = new javax.swing.JTextField();
        btTimHDN = new javax.swing.JButton();
        btXoaHDN = new javax.swing.JButton();
        btSuaHDN = new javax.swing.JButton();
        btThemHDN = new javax.swing.JButton();
        btLamMoiHDN = new javax.swing.JButton();
        jScrollPane5 = new javax.swing.JScrollPane();
        tbHDN = new javax.swing.JTable();
        jLabel43 = new javax.swing.JLabel();
        cbMaNVHDN = new javax.swing.JComboBox<>();
        cbMaMTHDN = new javax.swing.JComboBox<>();
        cbMaNCCHDN = new javax.swing.JComboBox<>();
        jTPNhaCC = new javax.swing.JTabbedPane();
        jPanel5 = new javax.swing.JPanel();
        jLabel44 = new javax.swing.JLabel();
        jLabel45 = new javax.swing.JLabel();
        jLabel46 = new javax.swing.JLabel();
        jLabel47 = new javax.swing.JLabel();
        jLabel48 = new javax.swing.JLabel();
        jLabel49 = new javax.swing.JLabel();
        txtMaNCC = new javax.swing.JTextField();
        txtTenNCC = new javax.swing.JTextField();
        txtDiaChiNCC = new javax.swing.JTextField();
        txtSDTNCC = new javax.swing.JTextField();
        txtTimNCC = new javax.swing.JTextField();
        btLamMoiNCC = new javax.swing.JButton();
        btThemNCC = new javax.swing.JButton();
        btSuaNCC = new javax.swing.JButton();
        btXoaNCC = new javax.swing.JButton();
        btTimNCC = new javax.swing.JButton();
        jScrollPane6 = new javax.swing.JScrollPane();
        tbNCC = new javax.swing.JTable();
        jTPDangXuat = new javax.swing.JPanel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Quản lý bán máy tính");

        tpQuanLy.setTabPlacement(javax.swing.JTabbedPane.LEFT);

        jLabel1.setText("Mã máy tính:");

        jLabel2.setText("Mã NCC:");

        jLabel3.setText("Số lượng:");

        jLabel4.setText("Giá bán:");

        jLabel5.setText("Tên máy tính:");

        tbThongTinMT.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null}
            },
            new String [] {
                "Mã máy tính", "Tên máy tính", "Mã nhà cung cấp", "Số lượng", "Giá bán", "Giá nhập"
            }
        ) {
            Class[] types = new Class [] {
                java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class
            };

            public Class getColumnClass(int columnIndex) {
                return types [columnIndex];
            }
        });
        tbThongTinMT.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbThongTinMTMouseClicked(evt);
            }
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                tbThongTinMTMouseEntered(evt);
            }
        });
        jScrollPane1.setViewportView(tbThongTinMT);

        btThem.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Them.png"))); // NOI18N
        btThem.setText("Thêm");
        btThem.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btThem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btThemActionPerformed(evt);
            }
        });

        btSua.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Sua.png"))); // NOI18N
        btSua.setText("Sửa");
        btSua.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btSua.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btSuaActionPerformed(evt);
            }
        });

        btXoa.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Xoa.png"))); // NOI18N
        btXoa.setText("Xóa");
        btXoa.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btXoa.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btXoaActionPerformed(evt);
            }
        });

        txtMaNCCMT.setEditable(false);

        jLabel6.setText("Tìm kiếm:");

        txtTim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtTimActionPerformed(evt);
            }
        });

        btTim.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/search-icon.png"))); // NOI18N
        btTim.setText("Tìm");
        btTim.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btTim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btTimActionPerformed(evt);
            }
        });

        btLamMoi.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Refresh.png"))); // NOI18N
        btLamMoi.setText("Làm mới");
        btLamMoi.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btLamMoi.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btLamMoiActionPerformed(evt);
            }
        });

        jLabel8.setFont(new java.awt.Font("Times New Roman", 1, 18)); // NOI18N
        jLabel8.setForeground(new java.awt.Color(23, 42, 216));
        jLabel8.setText("Quản Lý Thông Tin Máy Tính");

        cbMaNCC.setSelectedItem(cbMaNCC);
        cbMaNCC.addPopupMenuListener(new javax.swing.event.PopupMenuListener() {
            public void popupMenuCanceled(javax.swing.event.PopupMenuEvent evt) {
            }
            public void popupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {
                cbMaNCCPopupMenuWillBecomeInvisible(evt);
            }
            public void popupMenuWillBecomeVisible(javax.swing.event.PopupMenuEvent evt) {
            }
        });

        jLabel50.setText("Giá nhập:");

        javax.swing.GroupLayout pThongTinMTLayout = new javax.swing.GroupLayout(pThongTinMT);
        pThongTinMT.setLayout(pThongTinMTLayout);
        pThongTinMTLayout.setHorizontalGroup(
            pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pThongTinMTLayout.createSequentialGroup()
                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pThongTinMTLayout.createSequentialGroup()
                        .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addGroup(pThongTinMTLayout.createSequentialGroup()
                                .addContainerGap()
                                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(jLabel5)
                                    .addComponent(jLabel1)
                                    .addComponent(jLabel2))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addGroup(pThongTinMTLayout.createSequentialGroup()
                                        .addComponent(txtMaNCCMT, javax.swing.GroupLayout.PREFERRED_SIZE, 78, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(cbMaNCC, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                    .addComponent(txtMaMT, javax.swing.GroupLayout.DEFAULT_SIZE, 162, Short.MAX_VALUE)
                                    .addComponent(txtTenMT, javax.swing.GroupLayout.DEFAULT_SIZE, 162, Short.MAX_VALUE))
                                .addGap(30, 30, 30)
                                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(jLabel4)
                                    .addComponent(jLabel3)
                                    .addComponent(jLabel50))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 26, Short.MAX_VALUE))
                            .addGroup(pThongTinMTLayout.createSequentialGroup()
                                .addGap(21, 21, 21)
                                .addComponent(btLamMoi, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(btThem, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(19, 19, 19)))
                        .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addGroup(pThongTinMTLayout.createSequentialGroup()
                                .addComponent(txtSoLuong, javax.swing.GroupLayout.PREFERRED_SIZE, 162, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(jLabel6))
                            .addGroup(pThongTinMTLayout.createSequentialGroup()
                                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(txtGiaBan, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 162, Short.MAX_VALUE)
                                    .addComponent(btSua, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(txtGiaNhap, javax.swing.GroupLayout.Alignment.LEADING))
                                .addGap(70, 70, 70)
                                .addComponent(btXoa, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txtTim, javax.swing.GroupLayout.PREFERRED_SIZE, 162, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(btTim, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 949, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(pThongTinMTLayout.createSequentialGroup()
                        .addGap(351, 351, 351)
                        .addComponent(jLabel8)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pThongTinMTLayout.setVerticalGroup(
            pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pThongTinMTLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel8)
                .addGap(18, 18, 18)
                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(jLabel3)
                    .addComponent(txtMaMT, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtSoLuong, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtTim, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel6))
                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(pThongTinMTLayout.createSequentialGroup()
                        .addGap(18, 18, 18)
                        .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel5)
                            .addComponent(jLabel4)
                            .addComponent(txtTenMT, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txtGiaBan, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel2)
                            .addComponent(txtMaNCCMT, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(cbMaNCC, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel50)
                            .addComponent(txtGiaNhap, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(pThongTinMTLayout.createSequentialGroup()
                        .addGap(29, 29, 29)
                        .addComponent(btTim)))
                .addGap(22, 22, 22)
                .addGroup(pThongTinMTLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btThem)
                    .addComponent(btSua)
                    .addComponent(btXoa)
                    .addComponent(btLamMoi))
                .addGap(37, 37, 37)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 219, Short.MAX_VALUE))
        );

        tpSanPham.addTab("Thông tin máy tính", pThongTinMT);

        tpQuanLy.addTab("Sản phẩm", new javax.swing.ImageIcon(getClass().getResource("/images/MayTinh.png")), tpSanPham, ""); // NOI18N

        jLabel7.setFont(new java.awt.Font("Times New Roman", 1, 18)); // NOI18N
        jLabel7.setForeground(new java.awt.Color(0, 52, 215));
        jLabel7.setText("Quản Lý Thông Tin Nhân Viên");

        jLabel9.setText("Mã nhân viên:");

        jLabel10.setText("Giới tính:");

        jLabel11.setText("Tên nhân viên:");

        jLabel12.setText("Địa chỉ:");

        jLabel13.setText("Số điện thoại:");

        jLabel14.setText("Tìm kiếm:");

        btLamMoiNV.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Refresh.png"))); // NOI18N
        btLamMoiNV.setText("Làm mới");
        btLamMoiNV.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btLamMoiNV.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btLamMoiNVActionPerformed(evt);
            }
        });

        btThemNV.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Them.png"))); // NOI18N
        btThemNV.setText("Thêm");
        btThemNV.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btThemNV.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btThemNVActionPerformed(evt);
            }
        });

        btSuaNV.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Sua.png"))); // NOI18N
        btSuaNV.setText("Sửa");
        btSuaNV.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btSuaNV.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btSuaNVActionPerformed(evt);
            }
        });

        btXoaNV.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Xoa.png"))); // NOI18N
        btXoaNV.setText("Xóa");
        btXoaNV.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btXoaNV.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btXoaNVActionPerformed(evt);
            }
        });

        btTimNV.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/search-icon.png"))); // NOI18N
        btTimNV.setText("Tìm");
        btTimNV.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btTimNV.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btTimNVActionPerformed(evt);
            }
        });

        tbNV.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null}
            },
            new String [] {
                "Mã nhân viên", "Tên nhân viên", "Giới tính", "Địa chỉ", "Số điện thoại"
            }
        ) {
            boolean[] canEdit = new boolean [] {
                false, false, false, false, false
            };

            public boolean isCellEditable(int rowIndex, int columnIndex) {
                return canEdit [columnIndex];
            }
        });
        tbNV.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbNVMouseClicked(evt);
            }
        });
        jScrollPane2.setViewportView(tbNV);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane2)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(6, 6, 6)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel10)
                            .addComponent(jLabel9)
                            .addComponent(jLabel11))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(txtMaNV)
                            .addComponent(txtTenNV)
                            .addComponent(txtGioiTinhNV, javax.swing.GroupLayout.DEFAULT_SIZE, 160, Short.MAX_VALUE))
                        .addGap(26, 26, 26)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel12)
                            .addComponent(jLabel13)))
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, jPanel1Layout.createSequentialGroup()
                        .addGap(16, 16, 16)
                        .addComponent(btLamMoiNV, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 79, Short.MAX_VALUE)
                        .addComponent(btThemNV, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(33, 33, 33)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel7)
                        .addContainerGap())
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                .addComponent(txtDiaChiNV)
                                .addComponent(txtSDTNV, javax.swing.GroupLayout.DEFAULT_SIZE, 160, Short.MAX_VALUE))
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                .addGap(0, 94, Short.MAX_VALUE)
                                .addComponent(btSuaNV, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(83, 83, 83)))
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                .addComponent(btXoaNV, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(242, 242, 242))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addGap(46, 46, 46)
                                .addComponent(jLabel14)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(txtTimNV, javax.swing.GroupLayout.PREFERRED_SIZE, 160, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(btTimNV, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addContainerGap())))))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel7)
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel9)
                    .addComponent(jLabel12)
                    .addComponent(jLabel14)
                    .addComponent(txtMaNV, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtDiaChiNV, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtTimNV, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(13, 13, 13)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel11)
                            .addComponent(jLabel13)
                            .addComponent(txtTenNV, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txtSDTNV, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(18, 18, 18)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel10)
                            .addComponent(txtGioiTinhNV, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(32, 32, 32)
                        .addComponent(btTimNV)))
                .addGap(32, 32, 32)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btLamMoiNV)
                    .addComponent(btThemNV)
                    .addComponent(btSuaNV)
                    .addComponent(btXoaNV))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 42, Short.MAX_VALUE)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 209, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

        jTPNhanVien.addTab("Thông tin nhân viên", jPanel1);

        tpQuanLy.addTab("Nhân viên", new javax.swing.ImageIcon(getClass().getResource("/images/nhanvien.png")), jTPNhanVien); // NOI18N

        jLabel15.setFont(new java.awt.Font("Times New Roman", 1, 18)); // NOI18N
        jLabel15.setForeground(new java.awt.Color(0, 0, 255));
        jLabel15.setText("Quản Lý Thông Tin Khách Hàng");

        jLabel16.setText("Mã khách hàng:");

        jLabel17.setText("Tên khách hàng:");

        jLabel18.setText("Giới tính:");

        btLamMoiKH.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Refresh.png"))); // NOI18N
        btLamMoiKH.setText("Làm mới");
        btLamMoiKH.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btLamMoiKH.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btLamMoiKHActionPerformed(evt);
            }
        });

        btThemKH.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Them.png"))); // NOI18N
        btThemKH.setText("Thêm");
        btThemKH.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btThemKH.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btThemKHActionPerformed(evt);
            }
        });

        btSuaKH.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Sua.png"))); // NOI18N
        btSuaKH.setText("Sửa");
        btSuaKH.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btSuaKH.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btSuaKHActionPerformed(evt);
            }
        });

        jLabel19.setText("Địa chỉ:");

        jLabel20.setText("Số điện thoại:");

        jLabel21.setText("Tìm kiếm:");

        btTimKH.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/search-icon.png"))); // NOI18N
        btTimKH.setText("Tìm");
        btTimKH.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btTimKH.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btTimKHActionPerformed(evt);
            }
        });

        btXoaKH.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Xoa.png"))); // NOI18N
        btXoaKH.setText("Xóa");
        btXoaKH.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btXoaKH.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btXoaKHActionPerformed(evt);
            }
        });

        tbKH.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null}
            },
            new String [] {
                "Mã khách hàng", "Tên khách hàng", "Giới tính", "Địa chỉ", "Số điện thoại"
            }
        ));
        tbKH.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbKHMouseClicked(evt);
            }
        });
        jScrollPane3.setViewportView(tbKH);

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jLabel15)
                .addGap(301, 301, 301))
            .addComponent(jScrollPane3)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel18)
                            .addComponent(jLabel16)
                            .addComponent(jLabel17))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(txtMaKH, javax.swing.GroupLayout.DEFAULT_SIZE, 160, Short.MAX_VALUE)
                            .addComponent(txtTenKH)
                            .addComponent(txtGioiTinhKH))
                        .addGap(28, 28, 28)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel19)
                            .addComponent(jLabel20))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(txtDiaChiKH)
                            .addComponent(txtSDTKH, javax.swing.GroupLayout.PREFERRED_SIZE, 160, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(96, 96, 96)
                        .addComponent(jLabel21)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txtTimKH, javax.swing.GroupLayout.PREFERRED_SIZE, 160, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(btTimKH, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGap(19, 19, 19)
                        .addComponent(btLamMoiKH, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(81, 81, 81)
                        .addComponent(btThemKH, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(79, 79, 79)
                        .addComponent(btSuaKH, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(72, 72, 72)
                        .addComponent(btXoaKH, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(143, Short.MAX_VALUE))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel15)
                .addGap(30, 30, 30)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel2Layout.createSequentialGroup()
                                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(jLabel19)
                                    .addComponent(txtDiaChiKH, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(13, 13, 13)
                                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(jLabel20)
                                    .addComponent(txtSDTKH, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(jPanel2Layout.createSequentialGroup()
                                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(jLabel16)
                                    .addComponent(txtMaKH, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(16, 16, 16)
                                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                    .addComponent(jLabel17)
                                    .addComponent(txtTenKH, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                        .addGap(18, 18, 18)
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel18)
                            .addComponent(txtGioiTinhKH, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel21)
                            .addComponent(txtTimKH, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(32, 32, 32)
                        .addComponent(btTimKH)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 41, Short.MAX_VALUE)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btLamMoiKH)
                    .addComponent(btThemKH)
                    .addComponent(btSuaKH)
                    .addComponent(btXoaKH))
                .addGap(18, 18, 18)
                .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 209, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

        jTPKhachHang.addTab("Thông tin khách hàng", jPanel2);

        tpQuanLy.addTab("Khách hàng", new javax.swing.ImageIcon(getClass().getResource("/images/khachHang.png")), jTPKhachHang); // NOI18N

        jLabel22.setText("Mã hóa đơn:");

        jLabel23.setText("Mã nhân viên:");

        jLabel24.setText("Mã khách hàng:");

        txtMaHDB.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txtMaHDBKeyReleased(evt);
            }
        });

        txtMaNVHDB.setEditable(false);

        txtMaKHHDB.setEditable(false);

        jLabel25.setText("Mã máy tính:");

        jLabel26.setText("Số lượng:");

        jLabel27.setText("Ngày bán:");

        txtMaMTHDB.setEditable(false);

        txtSoLuongHDB.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txtSoLuongHDBKeyReleased(evt);
            }
        });

        jLabel28.setText("Địa chỉ:");

        jLabel29.setText("Số điện thoại:");

        jLabel30.setText("Giá bán:");

        txtDiaChiHDB.setEditable(false);

        txtSDTHDB.setEditable(false);

        txtGiaBanHDB.setEditable(false);
        txtGiaBanHDB.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                txtGiaBanHDBKeyReleased(evt);
            }
        });

        jLabel31.setText("Tổng tiền:");

        jLabel32.setText("Tìm kiếm:");

        txtTimHDB.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtTimHDBActionPerformed(evt);
            }
        });

        btLamMoiHDB.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Refresh.png"))); // NOI18N
        btLamMoiHDB.setText("Làm mới");
        btLamMoiHDB.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btLamMoiHDB.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btLamMoiHDBActionPerformed(evt);
            }
        });

        btThemHDB.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Them.png"))); // NOI18N
        btThemHDB.setText("Thêm");
        btThemHDB.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btThemHDB.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btThemHDBActionPerformed(evt);
            }
        });

        btSuaHDB.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Sua.png"))); // NOI18N
        btSuaHDB.setText("Sửa");
        btSuaHDB.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btSuaHDB.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btSuaHDBActionPerformed(evt);
            }
        });

        btXoaHDB.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Xoa.png"))); // NOI18N
        btXoaHDB.setText("Xóa");
        btXoaHDB.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btXoaHDB.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btXoaHDBActionPerformed(evt);
            }
        });

        btTimHDB.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/search-icon.png"))); // NOI18N
        btTimHDB.setText("Tìm");
        btTimHDB.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btTimHDB.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btTimHDBActionPerformed(evt);
            }
        });

        tbHDB.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null}
            },
            new String [] {
                "Mã hóa đơn", "Mã nhân viên", "Mã khách hàng", "Mã máy tính", "Số lượng", "Ngày bán", "Địa chỉ", "SĐT", "Giá bán", "Tổng tiền"
            }
        ));
        tbHDB.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbHDBMouseClicked(evt);
            }
        });
        jScrollPane4.setViewportView(tbHDB);

        cbMaNVHDB.addPopupMenuListener(new javax.swing.event.PopupMenuListener() {
            public void popupMenuCanceled(javax.swing.event.PopupMenuEvent evt) {
            }
            public void popupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {
                cbMaNVHDBPopupMenuWillBecomeInvisible(evt);
            }
            public void popupMenuWillBecomeVisible(javax.swing.event.PopupMenuEvent evt) {
            }
        });

        cbMaKHHDB.addPopupMenuListener(new javax.swing.event.PopupMenuListener() {
            public void popupMenuCanceled(javax.swing.event.PopupMenuEvent evt) {
            }
            public void popupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {
                cbMaKHHDBPopupMenuWillBecomeInvisible(evt);
            }
            public void popupMenuWillBecomeVisible(javax.swing.event.PopupMenuEvent evt) {
            }
        });

        cbMaMTHDB.addPopupMenuListener(new javax.swing.event.PopupMenuListener() {
            public void popupMenuCanceled(javax.swing.event.PopupMenuEvent evt) {
            }
            public void popupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {
                cbMaMTHDBPopupMenuWillBecomeInvisible(evt);
            }
            public void popupMenuWillBecomeVisible(javax.swing.event.PopupMenuEvent evt) {
            }
        });

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addComponent(btLamMoiHDB, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 105, Short.MAX_VALUE)
                        .addComponent(btThemHDB, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(103, 103, 103)
                        .addComponent(btSuaHDB, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel23)
                            .addComponent(jLabel22)
                            .addComponent(jLabel24)
                            .addComponent(jLabel31))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(txtMaHDB)
                            .addComponent(txtTongTienHDB, javax.swing.GroupLayout.DEFAULT_SIZE, 150, Short.MAX_VALUE)
                            .addGroup(jPanel3Layout.createSequentialGroup()
                                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(txtMaKHHDB, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 70, Short.MAX_VALUE)
                                    .addComponent(txtMaNVHDB, javax.swing.GroupLayout.Alignment.LEADING))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(cbMaNVHDB, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(cbMaKHHDB, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel25)
                            .addComponent(jLabel26, javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel27, javax.swing.GroupLayout.Alignment.TRAILING))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(txtSoLuongHDB, javax.swing.GroupLayout.DEFAULT_SIZE, 150, Short.MAX_VALUE)
                            .addComponent(txtNgayBan)
                            .addGroup(jPanel3Layout.createSequentialGroup()
                                .addComponent(txtMaMTHDB, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(cbMaMTHDB, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))))
                .addGap(34, 34, 34)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jLabel28)
                    .addComponent(jLabel29)
                    .addComponent(jLabel30)
                    .addComponent(jLabel32))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel3Layout.createSequentialGroup()
                        .addComponent(txtTimHDB, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(btTimHDB, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                        .addComponent(txtDiaChiHDB)
                        .addComponent(txtSDTHDB)
                        .addComponent(txtGiaBanHDB, javax.swing.GroupLayout.DEFAULT_SIZE, 150, Short.MAX_VALUE))
                    .addComponent(btXoaHDB, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(69, Short.MAX_VALUE))
            .addComponent(jScrollPane4, javax.swing.GroupLayout.Alignment.TRAILING)
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addGap(20, 20, 20)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel22)
                    .addComponent(jLabel25)
                    .addComponent(txtMaMTHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel28)
                    .addComponent(txtDiaChiHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtMaHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cbMaMTHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel26)
                    .addComponent(txtSoLuongHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel29)
                    .addComponent(txtSDTHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel23)
                    .addComponent(txtMaNVHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cbMaNVHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel24)
                    .addComponent(txtMaKHHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel27)
                    .addComponent(txtNgayBan, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel30)
                    .addComponent(txtGiaBanHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cbMaKHHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel31)
                    .addComponent(txtTongTienHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel32)
                    .addComponent(txtTimHDB, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(btTimHDB))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 35, Short.MAX_VALUE)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btLamMoiHDB)
                    .addComponent(btThemHDB)
                    .addComponent(btSuaHDB)
                    .addComponent(btXoaHDB))
                .addGap(18, 18, 18)
                .addComponent(jScrollPane4, javax.swing.GroupLayout.PREFERRED_SIZE, 213, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

        jTPHoaDon.addTab("Hóa đơn bán", jPanel3);

        jLabel33.setText("Mã hóa đơn:");

        jLabel34.setText("Mã nhân viên:");

        txtMaNVHDN.setEditable(false);

        jLabel35.setText("Mã máy tính:");

        jLabel36.setText("Tổng tiền:");

        txtMaMTHDN.setEditable(false);

        jLabel37.setText("Ngày nhập:");

        jLabel38.setText("Số lượng:");

        jLabel39.setText("Mã NCC:");

        txtMaNCCHDN.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtMaNCCHDNActionPerformed(evt);
            }
        });

        txtNgayNhap.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtNgayNhapActionPerformed(evt);
            }
        });

        jLabel40.setText("Giá nhập:");

        jLabel41.setText("Số điện thoại:");

        jLabel42.setText("Địa chỉ:");

        txtDiaChiHDN.setEditable(false);

        txtSDTHDN.setEditable(false);

        txtGiaNhapHDN.setEditable(false);

        txtTimHDN.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtTimHDNActionPerformed(evt);
            }
        });

        btTimHDN.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/search-icon.png"))); // NOI18N
        btTimHDN.setText("Tìm");
        btTimHDN.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btTimHDN.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btTimHDNActionPerformed(evt);
            }
        });

        btXoaHDN.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Xoa.png"))); // NOI18N
        btXoaHDN.setText("Xóa");
        btXoaHDN.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btXoaHDN.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btXoaHDNActionPerformed(evt);
            }
        });

        btSuaHDN.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Sua.png"))); // NOI18N
        btSuaHDN.setText("Sửa");
        btSuaHDN.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btSuaHDN.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btSuaHDNActionPerformed(evt);
            }
        });

        btThemHDN.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Them.png"))); // NOI18N
        btThemHDN.setText("Thêm");
        btThemHDN.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btThemHDN.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btThemHDNActionPerformed(evt);
            }
        });

        btLamMoiHDN.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Refresh.png"))); // NOI18N
        btLamMoiHDN.setText("Làm mới");
        btLamMoiHDN.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btLamMoiHDN.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btLamMoiHDNActionPerformed(evt);
            }
        });

        tbHDN.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null, null, null, null}
            },
            new String [] {
                "Mã hóa đơn", "Mã nhân viên", "Mã máy tính", "Mã NCC", "Số lượng", "Ngày nhập", "Địa chỉ", "SĐT", "Giá bán", "Tổng tiền"
            }
        ));
        tbHDN.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbHDNMouseClicked(evt);
            }
        });
        jScrollPane5.setViewportView(tbHDN);

        jLabel43.setText("Tìm kiếm:");

        cbMaNVHDN.addPopupMenuListener(new javax.swing.event.PopupMenuListener() {
            public void popupMenuCanceled(javax.swing.event.PopupMenuEvent evt) {
            }
            public void popupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {
                cbMaNVHDNPopupMenuWillBecomeInvisible(evt);
            }
            public void popupMenuWillBecomeVisible(javax.swing.event.PopupMenuEvent evt) {
            }
        });

        cbMaMTHDN.addPopupMenuListener(new javax.swing.event.PopupMenuListener() {
            public void popupMenuCanceled(javax.swing.event.PopupMenuEvent evt) {
            }
            public void popupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {
                cbMaMTHDNPopupMenuWillBecomeInvisible(evt);
            }
            public void popupMenuWillBecomeVisible(javax.swing.event.PopupMenuEvent evt) {
            }
        });

        cbMaNCCHDN.addPopupMenuListener(new javax.swing.event.PopupMenuListener() {
            public void popupMenuCanceled(javax.swing.event.PopupMenuEvent evt) {
            }
            public void popupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {
                cbMaNCCHDNPopupMenuWillBecomeInvisible(evt);
            }
            public void popupMenuWillBecomeVisible(javax.swing.event.PopupMenuEvent evt) {
            }
        });

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane5, javax.swing.GroupLayout.Alignment.TRAILING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel36)
                            .addComponent(jLabel33)
                            .addComponent(jLabel35)
                            .addComponent(jLabel34))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(txtMaHDN)
                            .addComponent(txtTongTienHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(jPanel4Layout.createSequentialGroup()
                                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(txtMaMTHDN, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 75, Short.MAX_VALUE)
                                    .addComponent(txtMaNVHDN, javax.swing.GroupLayout.Alignment.LEADING))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(cbMaNVHDN, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(cbMaMTHDN, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
                        .addGap(30, 30, 30))
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addComponent(btLamMoiHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(btThemHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(1, 1, 1)))
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel4Layout.createSequentialGroup()
                                .addGap(14, 14, 14)
                                .addComponent(jLabel39))
                            .addComponent(jLabel38, javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel37, javax.swing.GroupLayout.Alignment.TRAILING))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel4Layout.createSequentialGroup()
                                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(txtNgayNhap, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(btSuaHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(jLabel40))
                            .addGroup(jPanel4Layout.createSequentialGroup()
                                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(txtSoLuongHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addGroup(jPanel4Layout.createSequentialGroup()
                                        .addComponent(txtMaNCCHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 67, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(cbMaNCCHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 78, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 62, Short.MAX_VALUE)
                                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel41, javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addComponent(jLabel42, javax.swing.GroupLayout.Alignment.TRAILING)))))
                    .addComponent(jLabel43))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addComponent(txtTimHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 57, Short.MAX_VALUE)
                        .addComponent(btTimHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(41, 41, 41))
                    .addGroup(jPanel4Layout.createSequentialGroup()
                        .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txtDiaChiHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txtSDTHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(txtGiaNhapHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(btXoaHDN, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
        );
        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addGap(18, 18, 18)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel33)
                    .addComponent(txtMaHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel39)
                    .addComponent(txtMaNCCHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtDiaChiHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel42)
                    .addComponent(cbMaNCCHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel34)
                    .addComponent(txtMaNVHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel38)
                    .addComponent(txtSoLuongHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel41)
                    .addComponent(txtSDTHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cbMaNVHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel35)
                    .addComponent(txtMaMTHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel37)
                    .addComponent(txtNgayNhap, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel40)
                    .addComponent(txtGiaNhapHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(cbMaMTHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(txtTongTienHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(txtTimHDN, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addComponent(jLabel43)
                        .addComponent(btTimHDN))
                    .addComponent(jLabel36))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 32, Short.MAX_VALUE)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btXoaHDN)
                    .addComponent(btSuaHDN)
                    .addComponent(btThemHDN)
                    .addComponent(btLamMoiHDN))
                .addGap(18, 18, 18)
                .addComponent(jScrollPane5, javax.swing.GroupLayout.PREFERRED_SIZE, 225, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

        jTPHoaDon.addTab("Hóa đơn nhập", jPanel4);

        tpQuanLy.addTab("Hóa đơn", new javax.swing.ImageIcon(getClass().getResource("/images/hoadon.png")), jTPHoaDon); // NOI18N

        jLabel44.setFont(new java.awt.Font("Times New Roman", 1, 18)); // NOI18N
        jLabel44.setForeground(new java.awt.Color(0, 0, 255));
        jLabel44.setText("Quản Lý Thông Tin Nhà Cung Cấp");

        jLabel45.setText("Mã nhà cung cấp:");

        jLabel46.setText("Tên nhà cung cấp:");

        jLabel47.setText("Địa chỉ:");

        jLabel48.setText("Số điện thoại:");

        jLabel49.setText("Tìm  kiếm:");

        btLamMoiNCC.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Refresh.png"))); // NOI18N
        btLamMoiNCC.setText("Làm mới");
        btLamMoiNCC.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btLamMoiNCC.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btLamMoiNCCActionPerformed(evt);
            }
        });

        btThemNCC.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Them.png"))); // NOI18N
        btThemNCC.setText("Thêm");
        btThemNCC.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btThemNCC.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btThemNCCActionPerformed(evt);
            }
        });

        btSuaNCC.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Sua.png"))); // NOI18N
        btSuaNCC.setText("Sửa");
        btSuaNCC.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btSuaNCC.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btSuaNCCActionPerformed(evt);
            }
        });

        btXoaNCC.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/Xoa.png"))); // NOI18N
        btXoaNCC.setText("Xóa");
        btXoaNCC.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btXoaNCC.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btXoaNCCActionPerformed(evt);
            }
        });

        btTimNCC.setIcon(new javax.swing.ImageIcon(getClass().getResource("/images/search-icon.png"))); // NOI18N
        btTimNCC.setText("Tìm");
        btTimNCC.setMargin(new java.awt.Insets(2, 0, 2, 0));
        btTimNCC.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btTimNCCActionPerformed(evt);
            }
        });

        tbNCC.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "Mã nhà cung cấp", "Tên nhà cung cấp", "Địa chỉ", "Số điện thoại"
            }
        ));
        tbNCC.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbNCCMouseClicked(evt);
            }
        });
        jScrollPane6.setViewportView(tbNCC);

        javax.swing.GroupLayout jPanel5Layout = new javax.swing.GroupLayout(jPanel5);
        jPanel5.setLayout(jPanel5Layout);
        jPanel5Layout.setHorizontalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel5Layout.createSequentialGroup()
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel5Layout.createSequentialGroup()
                        .addGap(349, 349, 349)
                        .addComponent(jLabel44))
                    .addGroup(jPanel5Layout.createSequentialGroup()
                        .addGap(44, 44, 44)
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jLabel46)
                            .addComponent(jLabel45))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel5Layout.createSequentialGroup()
                                .addComponent(btLamMoiNCC, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 107, Short.MAX_VALUE)
                                .addComponent(btThemNCC, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(61, 61, 61)
                                .addComponent(btSuaNCC, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(53, 53, 53)
                                .addComponent(jLabel49))
                            .addGroup(jPanel5Layout.createSequentialGroup()
                                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(txtMaNCC)
                                    .addComponent(txtTenNCC, javax.swing.GroupLayout.DEFAULT_SIZE, 155, Short.MAX_VALUE))
                                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(jPanel5Layout.createSequentialGroup()
                                        .addGap(89, 89, 89)
                                        .addComponent(jLabel47))
                                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel5Layout.createSequentialGroup()
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(jLabel48)))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(txtSDTNCC, javax.swing.GroupLayout.PREFERRED_SIZE, 155, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(txtDiaChiNCC, javax.swing.GroupLayout.PREFERRED_SIZE, 155, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(0, 0, Short.MAX_VALUE)))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(txtTimNCC, javax.swing.GroupLayout.PREFERRED_SIZE, 155, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                .addComponent(btTimNCC, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(btXoaNCC, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, 100, Short.MAX_VALUE)))))
                .addContainerGap(95, Short.MAX_VALUE))
            .addComponent(jScrollPane6)
        );
        jPanel5Layout.setVerticalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel5Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel44)
                .addGap(35, 35, 35)
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel45)
                    .addComponent(jLabel47)
                    .addComponent(jLabel49)
                    .addComponent(txtMaNCC, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtDiaChiNCC, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(txtTimNCC, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(36, 36, 36)
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txtTenNCC, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel46)
                    .addComponent(jLabel48)
                    .addComponent(txtSDTNCC, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(btTimNCC))
                .addGap(41, 41, 41)
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btLamMoiNCC)
                    .addComponent(btThemNCC)
                    .addComponent(btSuaNCC)
                    .addComponent(btXoaNCC))
                .addGap(18, 18, 18)
                .addComponent(jScrollPane6, javax.swing.GroupLayout.PREFERRED_SIZE, 206, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jTPNhaCC.addTab("Nhà cung cấp", jPanel5);

        tpQuanLy.addTab("Nhà cung cấp", new javax.swing.ImageIcon(getClass().getResource("/images/doitac.png")), jTPNhaCC); // NOI18N

        jTPDangXuat.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jTPDangXuatMouseClicked(evt);
            }
        });
        jTPDangXuat.addComponentListener(new java.awt.event.ComponentAdapter() {
            public void componentShown(java.awt.event.ComponentEvent evt) {
                jTPDangXuatComponentShown(evt);
            }
        });

        javax.swing.GroupLayout jTPDangXuatLayout = new javax.swing.GroupLayout(jTPDangXuat);
        jTPDangXuat.setLayout(jTPDangXuatLayout);
        jTPDangXuatLayout.setHorizontalGroup(
            jTPDangXuatLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 964, Short.MAX_VALUE)
        );
        jTPDangXuatLayout.setVerticalGroup(
            jTPDangXuatLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 478, Short.MAX_VALUE)
        );

        tpQuanLy.addTab("Đăng xuất", new javax.swing.ImageIcon(getClass().getResource("/images/thoat.png")), jTPDangXuat); // NOI18N

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(tpQuanLy, javax.swing.GroupLayout.PREFERRED_SIZE, 1064, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(tpQuanLy, javax.swing.GroupLayout.PREFERRED_SIZE, 471, javax.swing.GroupLayout.PREFERRED_SIZE)
        );

        tpQuanLy.getAccessibleContext().setAccessibleName("");

        pack();
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void jTPDangXuatComponentShown(java.awt.event.ComponentEvent evt) {//GEN-FIRST:event_jTPDangXuatComponentShown
   
        jfrmLogin jfrmL = new jfrmLogin();
        jfrmL.show();
        this.dispose();
    }//GEN-LAST:event_jTPDangXuatComponentShown

    private void jTPDangXuatMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTPDangXuatMouseClicked
        if (JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn đăng xuất hay không","Thông báo",2)==0)    
        this.dispose();
    }//GEN-LAST:event_jTPDangXuatMouseClicked
//set button Thêm thông tinh MT
    private void btThemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btThemActionPerformed
       if (this.txtMaMT.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã máy tính không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMT.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được vượt quá 10 ký tự","Thông báo",1);
        else
            if(this.txtTenMT.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Tên máy tính không được bỏ trống","Thông báo",1);
        else
            if(this.txtMaNCCMT.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được bỏ trống","Thông báo",1);
        else
            if(this.txtSoLuong.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Số lượng không được bỏ trống","Thông báo",1);
        else 
            if(this.txtGiaBan.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Giá bán không được bỏ trống","Thông báo",1);
        else 
            if(this.txtGiaNhap.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Giá nhập không được bỏ trống","Thông báo",1);    
        else
            if(CheckKyTu.CheckKT(this.txtMaMT.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenMT.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên máy tính không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckNum(this.txtSoLuong.getText())== false)
                JOptionPane.showMessageDialog(null, "Số lượng chỉ được nhập số","Thông báo",1);
        else
            if(CheckKyTu.CheckNum(this.txtGiaBan.getText())== false)
                JOptionPane.showMessageDialog(null, "Giá bán chỉ được nhập số","Thông báo",1);
        else
            if(CheckKyTu.CheckNum(this.txtGiaNhap.getText())== false)
                JOptionPane.showMessageDialog(null, "Giá bán chỉ được nhập số","Thông báo",1);    
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn thêm sản phẩm hay không ?","Thông báo",2)==0)
                   ThongTinMT.InsertMT(this.txtMaMT.getText().trim(), this.txtTenMT.getText().trim(), this.txtMaNCCMT.getText().trim(), this.txtSoLuong.getText().trim(), this.txtGiaBan.getText().trim(),this.txtGiaNhap.getText());
                   showCT();
                   
               }
    }//GEN-LAST:event_btThemActionPerformed
//Set button sử thông tinh máy tính
    private void btSuaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btSuaActionPerformed
        if (this.txtMaMT.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã máy tính không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMT.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được vượt quá 10 ký tự","Thông báo",1);
        else
            if(this.txtTenMT.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Tên máy tính không được bỏ trống","Thông báo",1);
        else
            if(this.txtMaNCCMT.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được bỏ trống","Thông báo",1);
        else
            if(this.txtSoLuong.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Số lượng không được bỏ trống","Thông báo",1);
        else 
            if(this.txtGiaBan.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Giá bán không được bỏ trống","Thông báo",1);
        else 
            if(this.txtGiaNhap.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Giá nhập không được bỏ trống","Thông báo",1);    
        else
            if(CheckKyTu.CheckKT(this.txtMaMT.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenMT.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên máy tính không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckNum(this.txtSoLuong.getText())== false)
                JOptionPane.showMessageDialog(null, "Số lượng chỉ được nhập số","Thông báo",1);
        else
            if(CheckKyTu.CheckNum(this.txtGiaBan.getText())== false)
                JOptionPane.showMessageDialog(null, "Giá bán chỉ được nhập số","Thông báo",1);
        else
            if(CheckKyTu.CheckNum(this.txtGiaNhap.getText())== false)
                JOptionPane.showMessageDialog(null, "Giá bán chỉ được nhập số","Thông báo",1);    
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn sửa hay không ?","Thông báo",2)==0)
                   ThongTinMT.UpdateMT(MaMT,this.txtMaMT.getText().trim(), this.txtTenMT.getText().trim(), this.txtMaNCCMT.getText().trim(), this.txtSoLuong.getText().trim(), this.txtGiaBan.getText().trim(),this.txtGiaNhap.getText());
                   showCT();
                   
               }
    }//GEN-LAST:event_btSuaActionPerformed
//Set button xóa thông thông máy tính
    private void btXoaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btXoaActionPerformed
       
        if (this.txtMaMT.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Bạn cần chọn lớp để xóa","Thông báo",1);
       else 
         {
             if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn xóa hay không ?","Thông báo",2)==0)
                ThongTinMT.DeleteMT(MaMT);
                showCT();
                this.btThem.setEnabled(true);
                this.btSua.setEnabled(false);
                this.btXoa.setEnabled(false);
                this.txtMaMT.setText(null);
                this.txtTenMT.setText(null);
                this.txtMaNCCMT.setText(null);
                this.txtSoLuong.setText(null);
                this.txtGiaBan.setText(null);
                this.txtTim.setText(null);

         }
    }//GEN-LAST:event_btXoaActionPerformed

    private void tbThongTinMTMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbThongTinMTMouseClicked
       //Java nen try catch
       //ProcessCrt(true);
            this.btSua.setEnabled(true);
            this.btXoa.setEnabled(true);
            this.btThem.setEnabled(false);
            this.txtMaMT.setEditable(false);
        
        try {
            int row = this.tbThongTinMT.getSelectedRow();//lấy dòng hiện tại mình đang nhấn chuột
            String IDrow = (this.tbThongTinMT.getModel().getValueAt(row, 0)).toString();
            //Lấy giá trị ở dòng i vừa nhấn và lấy giá trị đó đổi ra string. VD ta lấy dc giá trị là TH4
            String sql1="SELECT * FROM ThongTinMayTinh where MaMT='"+IDrow+"'";
            ResultSet rs = UpdataTable.ShowTextField(sql1);
            
            //Đọc dữ liệu tại dòng có mã TH4
            if(rs.next())//nếu có dữ liệu
            {
                MaMT = rs.getString("MaMT");
                this.txtMaMT.setText(rs.getString("MaMT"));
                this.txtTenMT.setText(rs.getString("TenMT"));
                this.txtMaNCCMT.setText(rs.getString("MaNCC"));
                this.txtSoLuong.setText(rs.getString("SoLuong"));
                this.txtGiaBan.setText(rs.getString("GiaBan"));
                this.txtGiaNhap.setText(rs.getString("GiaNhap"));
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
      
        
    }//GEN-LAST:event_tbThongTinMTMouseClicked
//set button tìm thông tin máy tính
    private void btTimActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btTimActionPerformed
        if(this.txtTim.getText().length()==0)
            JOptionPane.showMessageDialog(null, "Bạn chưa nhập từ khóa cần tìm","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTim.getText())== true)
                JOptionPane.showMessageDialog(null, "Không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            String sql1="SELECT MaMT as 'Mã máy tính', TenMT as 'Tên máy tính', MaNCC as 'Mã nhà cung cấp', Soluong as 'Số lượng', Giaban as 'Giá bán', Gianhap as 'Giá nhập' "
                    + "FROM ThongTinMayTinh where MaMT like N'%"+this.txtTim.getText()+"%' or TenMT like N'%"+this.txtTim.getText()+"%'";
            UpdataTable.LoadData(sql1, tbThongTinMT);
            
        }
    }//GEN-LAST:event_btTimActionPerformed
//set button làm mới Thông tinh máy tính
    private void btLamMoiActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btLamMoiActionPerformed
        this.btThem.setEnabled(true);
        this.btSua.setEnabled(false);
        this.btXoa.setEnabled(false);
        this.txtMaMT.setText(null);
        this.txtTenMT.setText(null);
        this.txtMaNCCMT.setText(null);
        this.txtSoLuong.setText(null);
        this.txtGiaBan.setText(null);
        this.txtTim.setText(null);
        this.txtMaMT.setEditable(true);
        UpdataTable.LoadData(sqlMT, tbThongTinMT);
    }//GEN-LAST:event_btLamMoiActionPerformed

    private void txtTimActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtTimActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtTimActionPerformed
//Set button sửa thông tin nhân viên
    private void btSuaNVActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btSuaNVActionPerformed
       if (this.txtMaNV.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã nhân viên không được bỏ trống","Thông báo",1);
       else 
           if(this.txtMaNV.getText().length()>10)
            JOptionPane.showMessageDialog(null, "Mã nhân viên không được vượt quá 10 ký tự","Thông báo",1);
       else
           if(this.txtTenNV.getText().length()==0)
            JOptionPane.showMessageDialog(null, "Tên nhân viên không được bỏ trống","Thông báo",1);
       else
           if(this.txtTenNV.getText().length()< 2)
            JOptionPane.showMessageDialog(null, "Tên nhân viên phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);
       else
           if(this.txtTenNV.getText().length()> 25)
            JOptionPane.showMessageDialog(null, "Tên nhân viên phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);    
       else
           if(this.txtGioiTinhNV.getText().length()==0)
                   JOptionPane.showMessageDialog(null, "Giới tính nhân viên không được bỏ trống","Thông báo",1);
       else
           if(this.txtDiaChiNV.getText().length()==0)
                   JOptionPane.showMessageDialog(null, "Địa chỉ nhân viên không được bỏ trống","Thông báo",1);
       else 
           if(this.txtSDTNV.getText().length()==0)
                   JOptionPane.showMessageDialog(null, "Số điện thoại không được bỏ trống","Thông báo",1);
       else
            if(CheckKyTu.CheckKT(this.txtMaNV.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenNV.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên nhân viên không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtDiaChiNV.getText())== true)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được nhập ký tự đặt biệt","Thông báo",1);
       else
            if(CheckSDT.checkNumberPhone(this.txtSDTNV.getText())== true)
            JOptionPane.showMessageDialog(null, "Số điện thoại không hợp lệ","Thông báo",1);
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn sửa hay không ?","Thông báo",2)==0)
                   ThongTinNV.UpdateNV(MaNV,this.txtMaNV.getText().trim(), this.txtTenNV.getText().trim(), this.txtGioiTinhNV.getText().trim(), this.txtDiaChiNV.getText().trim(), this.txtSDTNV.getText());
                   showCT();
                  
               }
    }//GEN-LAST:event_btSuaNVActionPerformed

    private void btSuaHDBActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btSuaHDBActionPerformed
        if (this.txtMaHDB.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã hóa đơn không được bỏ trống","Thông báo",1);
       else 
           if(this.txtMaHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được vượt quá 10 ký tự","Thông báo",1);
       else
            if(this.txtMaNVHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaNVHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaKHHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã khách hàng không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaKHHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã khách hàng không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaMTHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMTHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được vượt quá 10 ký tự","Thông báo",1);    
        else 
            if(this.txtSoLuongHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số lượng","Thông báo",1);
        else 
            if(this.txtNgayBan.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập ngày bán","Thông báo",1); 
        else 
            if(this.txtDiaChiHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập địa chỉ","Thông báo",1);
        else 
            if(this.txtSDTHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số điện thoại","Thông báo",1);
        else 
            if(this.txtGiaBanHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập giá bán","Thông báo",1);
        else 
            if(this.txtTongTienHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập tổng tiền","Thông báo",1);    
        else
            if(CheckKyTu.CheckKT(this.txtMaHDB.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được nhập ký tự đặt biệt","Thông báo",1);    
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn sửa hay không ?","Thông báo",2)==0)
                   HoaDonBan.UpdateHDB(MaHDB,this.txtMaHDB.getText().trim(), this.txtMaNVHDB.getText().trim(), this.txtMaKHHDB.getText().trim(), this.txtMaMTHDB.getText().trim(),this.txtSoLuongHDB.getText().trim(),
                           this.txtNgayBan.getText().trim(),this.txtDiaChiHDB.getText().trim(),this.txtSDTHDB.getText().trim(),this.txtGiaBanHDB.getText().trim(),this.txtTongTienHDB.getText());
                   showCT();
                   
                   
               }
    }//GEN-LAST:event_btSuaHDBActionPerformed

    private void btTimHDBActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btTimHDBActionPerformed
        if(this.txtTimHDB.getText().length()==0)
            JOptionPane.showMessageDialog(null, "Bạn chưa nhập từ khóa cần tìm","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTimHDB.getText())== true)
                JOptionPane.showMessageDialog(null, "Không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            String sql1="SELECT MaHDB as 'Mã hóa đơn',MaNV as 'Mã nhân viên',MaKH as 'Mã khách hàng',\n" +
"MaMT as 'Mã máy tính',Soluong as 'Số lượng',Ngayban as 'Ngày Bán' ,Diachi as 'Địa chỉ',SDT as 'Số điện thoại',Giaban as 'Giá bán', Tongtien  as 'Tổng tiền' "
                    + "FROM HoaDonBan where MaHDB like N'%"+this.txtTimHDB.getText()+"%' or MaMT like N'%"+this.txtTimHDB.getText()+"%' or MaKH like N'%"+this.txtTimHDB.getText()+"%'";
            UpdataTable.LoadData(sql1, tbHDB);
            
        }
    }//GEN-LAST:event_btTimHDBActionPerformed

    private void txtTimHDBActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtTimHDBActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtTimHDBActionPerformed

    private void txtTimHDNActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtTimHDNActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtTimHDNActionPerformed

    private void btTimHDNActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btTimHDNActionPerformed
    if(this.txtTimHDN.getText().length()==0)
            JOptionPane.showMessageDialog(null, "Bạn chưa nhập từ khóa cần tìm","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTimHDN.getText())== true)
                JOptionPane.showMessageDialog(null, "Không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            String sql1="SELECT MaHDN as 'Mã hóa đơn', MaNV as 'Mã nhân viên',MaNCC as 'Mã nhà cung cấp',\n" +
"MaMT as 'Mã máy tính',Soluong as 'Số lượng',Ngaynhap as 'Ngày Nhập' ,\n" +
"Diachi as 'Địa chỉ',SDT as 'Số điện thoại',Gianhap as 'Giá nhập', Tongtien as 'Tổng tiền' "
                    + "FROM HoaDonNhap where MaHDN like N'%"+this.txtTimHDN.getText()+"%' or MaMT like N'%"+this.txtTimHDN.getText()+"%' or MaNCC like N'%"+this.txtTimHDN.getText()+"%'";
            UpdataTable.LoadData(sql1, tbHDN);
            
        }
    }//GEN-LAST:event_btTimHDNActionPerformed

    private void btSuaHDNActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btSuaHDNActionPerformed
       if (this.txtMaHDN.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã hóa đơn không được bỏ trống","Thông báo",1);
       else 
           if(this.txtMaHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được vượt quá 10 ký tự","Thông báo",1);
       else
            if(this.txtMaNVHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaNVHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaMTHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMTHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaNCCHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaNCCHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được vượt quá 10 ký tự","Thông báo",1);    
        else 
            if(this.txtSoLuongHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số lượng","Thông báo",1);
        else 
            if(this.txtNgayNhap.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập ngày nhập","Thông báo",1); 
        else 
            if(this.txtDiaChiHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập địa chỉ","Thông báo",1);
        else 
            if(this.txtSDTHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số điện thoại","Thông báo",1);
        else 
            if(this.txtGiaNhapHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số giá nhập","Thông báo",1);
        else 
            if(this.txtTongTienHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập tổng tiền","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtMaHDN.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được nhập ký tự đặt biệt","Thông báo",1);    
            
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn thêm hay không ?","Thông báo",2)==0)
                   HoaDonNhap.UpdateHDN(MaHDN,this.txtMaHDN.getText().trim(), this.txtMaNVHDN.getText().trim(), this.txtMaMTHDN.getText().trim(), this.txtMaNCCHDN.getText().trim(),this.txtSoLuongHDN.getText().trim(),
                           this.txtNgayNhap.getText().trim(),this.txtDiaChiHDN.getText().trim(),this.txtSDTHDN.getText().trim(),this.txtGiaNhapHDN.getText().trim(),this.txtTongTienHDN.getText());
                   showCT();
                   
               }
    }//GEN-LAST:event_btSuaHDNActionPerformed

    private void txtMaNCCHDNActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtMaNCCHDNActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtMaNCCHDNActionPerformed

    private void txtNgayNhapActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtNgayNhapActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtNgayNhapActionPerformed

    private void btSuaNCCActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btSuaNCCActionPerformed
      if (this.txtMaNCC.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMT.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được vượt quá 10 ký tự","Thông báo",1);
        else
            if(this.txtTenNCC.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Tên nhà cung cấp không được bỏ trống","Thông báo",1);
        else
            if(this.txtTenNCC.getText().length()>50)
                JOptionPane.showMessageDialog(null, "Tên nhà cung cấp không được vượt quá 50 ký tự","Thông báo",1);
        else
            if(this.txtDiaChiNCC.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được bỏ trống","Thông báo",1);
        else 
            if(this.txtSDTNCC.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Số điện thoại không được bỏ trống","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtMaNCC.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenNCC.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên nhà cung cấp không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtDiaChiNCC.getText())== true)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckSDT.checkNumberPhone(this.txtSDTNCC.getText())== true)
            JOptionPane.showMessageDialog(null, "Số điện thoại không hợp lệ","Thông báo",1);
        
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn sửa hay không ?","Thông báo",2)==0)
                   ThongTinNCC.UpdateNCC(MaNCC,this.txtMaNCC.getText().trim(), this.txtTenNCC.getText().trim(), this.txtDiaChiNCC.getText().trim(), this.txtSDTNCC.getText());
                   showCT();
                   
               }
    }//GEN-LAST:event_btSuaNCCActionPerformed
//Lấy thông tin nhân viên từ bảng lên textfield khi nhấp chuột vào
    private void tbNVMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbNVMouseClicked
        
        this.btSuaNV.setEnabled(true);
        this.btXoaNV.setEnabled(true);
        this.btThemNV.setEnabled(false);
        this.txtMaNV.setEditable(false);
        try {
            int row = this.tbNV.getSelectedRow();//lấy dòng hiện tại mình đang nhấn chuột
            String IDrow = (this.tbNV.getModel().getValueAt(row, 0)).toString();
            //Lấy giá trị ở dòng i vừa nhấn và lấy giá trị đó đổi ra string. VD ta lấy dc giá trị là TH4
            String sql1="SELECT * FROM NhanVien where MaNV='"+IDrow+"'";
            ResultSet rs = UpdataTable.ShowTextField(sql1);
            //Đọc dữ liệu tại dòng có mã TH4
            if(rs.next())//nếu có dữ liệu
            {
                MaNV = rs.getString("MaNV");
                this.txtMaNV.setText(rs.getString("MaNV"));
                this.txtTenNV.setText(rs.getString("TenNV"));
                this.txtGioiTinhNV.setText(rs.getString("Gioitinh"));
                this.txtDiaChiNV.setText(rs.getString("Diachi"));
                this.txtSDTNV.setText(rs.getString("SDT"));
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
    }//GEN-LAST:event_tbNVMouseClicked
//set button thông tinh NV
    private void btLamMoiNVActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btLamMoiNVActionPerformed
        this.btThemNV.setEnabled(true);
        this.btSuaNV.setEnabled(false);
        this.btXoaNV.setEnabled(false);
        this.txtMaNV.setText(null);
        this.txtTenNV.setText(null);
        this.txtGioiTinhNV.setText(null);
        this.txtDiaChiNV.setText(null);
        this.txtSDTNV.setText(null);
        this.txtTimNV.setText(null);
        this.txtMaNV.setEditable(true);
        UpdataTable.LoadData(sqlNV, tbNV);
    }//GEN-LAST:event_btLamMoiNVActionPerformed
//set button thêm thông tinh NV
    private void btThemNVActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btThemNVActionPerformed
       if (this.txtMaNV.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã nhân viên không được bỏ trống","Thông báo",1);
       else 
           if(this.txtMaNV.getText().length()>10)
            JOptionPane.showMessageDialog(null, "Mã nhân viên không được vượt quá 10 ký tự","Thông báo",1);
       else
           if(this.txtTenNV.getText().length()==0)
            JOptionPane.showMessageDialog(null, "Tên nhân viên không được bỏ trống","Thông báo",1);
       else
           if(this.txtTenNV.getText().length()< 2)
            JOptionPane.showMessageDialog(null, "Tên nhân viên phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);
       else
           if(this.txtTenNV.getText().length()> 25)
            JOptionPane.showMessageDialog(null, "Tên nhân viên phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);    
       else
           if(this.txtGioiTinhNV.getText().length()==0)
                   JOptionPane.showMessageDialog(null, "Giới tính nhân viên không được bỏ trống","Thông báo",1);
       else
           if(this.txtDiaChiNV.getText().length()==0)
                   JOptionPane.showMessageDialog(null, "Địa chỉ nhân viên không được bỏ trống","Thông báo",1);
       else 
           if(this.txtSDTNV.getText().length()==0)
                   JOptionPane.showMessageDialog(null, "Số điện thoại không được bỏ trống","Thông báo",1);
       else
            if(CheckKyTu.CheckKT(this.txtMaNV.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenNV.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên nhân viên cấp không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtDiaChiNV.getText())== true)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được nhập ký tự đặt biệt","Thông báo",1);
       else
            if(CheckSDT.checkNumberPhone(this.txtSDTNV.getText())== true)
            JOptionPane.showMessageDialog(null, "Số điện thoại không hợp lệ","Thông báo",1);
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn thêm hay không ?","Thông báo",2)==0)
                   ThongTinNV.InsertNV(this.txtMaNV.getText().trim(), this.txtTenNV.getText().trim(), this.txtGioiTinhNV.getText().trim(), this.txtDiaChiNV.getText().trim(), this.txtSDTNV.getText());
                   showCT();
                   
               }
    }//GEN-LAST:event_btThemNVActionPerformed
//sêt buttton xóa thông tinh nhân viên
    private void btXoaNVActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btXoaNVActionPerformed
        if (this.txtMaNV.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Bạn cần chọn lớp để xóa","Thông báo",1);
       else 
         {
             if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn xóa hay không ?","Thông báo",2)==0)
                ThongTinNV.DeleteNV(MaNV);
                showCT();
                this.btThemNV.setEnabled(true);
                this.btSuaNV.setEnabled(false);
                this.btXoaNV.setEnabled(false);
                this.txtMaNV.setText(null);
                this.txtTenNV.setText(null);
                this.txtGioiTinhNV.setText(null);
                this.txtDiaChiNV.setText(null);
                this.txtSDTNV.setText(null);
                this.txtTimNV.setText(null);
               
         }
    }//GEN-LAST:event_btXoaNVActionPerformed
//Set button tim thông tin nhân viên
    private void btTimNVActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btTimNVActionPerformed
        if(this.txtTimNV.getText().length()==0)
            JOptionPane.showMessageDialog(null, "Bạn chưa nhập từ khóa cần tìm","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTim.getText())== true)
                JOptionPane.showMessageDialog(null, "Không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            String sql1="SELECT MaNV as 'Mã nhân viên', TenNV as 'Tên nhân viên', Gioitinh as 'Giới tính', Diachi as 'Địa chỉ', SDT as 'Số điện thoại'"
                    + "FROM NhanVien where MaNV like N'%"+this.txtTimNV.getText()+"%' or TenNV like N'%"+this.txtTimNV.getText()+"%'";
            UpdataTable.LoadData(sql1, tbNV);
            
        }
    }//GEN-LAST:event_btTimNVActionPerformed

    private void tbHDBMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbHDBMouseClicked
        this.btSuaHDB.setEnabled(true);
        this.btXoaHDB.setEnabled(true);
        this.btThemHDB.setEnabled(false);
        this.txtMaHDB.setEditable(false);
        try {
            int row = this.tbHDB.getSelectedRow();//lấy dòng hiện tại mình đang nhấn chuột
            String IDrow = (this.tbHDB.getModel().getValueAt(row, 0)).toString();
            //Lấy giá trị ở dòng i vừa nhấn và lấy giá trị đó đổi ra string. VD ta lấy dc giá trị là TH4
            String sql1="SELECT MaHDB ,HoaDonBan.MaNV ,HoaDonBan.MaKH ,\n" +
"HoaDonBan.MaMT ,HoaDonBan.Soluong ,Ngayban ,KhachHang.Diachi ,KhachHang.SDT ,ThongTinMayTinh.Giaban , HoaDonBan.Soluong * ThongTinMayTinh.Giaban \n" +
"FROM HoaDonBan, KhachHang, ThongTinMayTinh where HoaDonBan.MaKH = KhachHang.MaKH and HoaDonBan.MaMT =ThongTinMayTinh.MaMT and MaHDB='"+IDrow+"'";
            ResultSet rs = UpdataTable.ShowTextField(sql1);
            //Đọc dữ liệu tại dòng có mã TH4
            if(rs.next())//nếu có dữ liệu
            {
                MaHDB = rs.getString("MaHDB");
                this.txtMaHDB.setText(rs.getString("MaHDB"));
                this.txtMaNVHDB.setText(rs.getString("MaNV"));
                this.txtMaKHHDB.setText(rs.getString("MaKH"));
                this.txtMaMTHDB.setText(rs.getString("MaMT"));
                this.txtSoLuongHDB.setText(rs.getString("Soluong"));
                this.txtNgayBan.setText(rs.getString("NgayBan"));
                this.txtDiaChiHDB.setText(rs.getString("Diachi"));
                this.txtSDTHDB.setText(rs.getString("SDT"));
                this.txtGiaBanHDB.setText(rs.getString("GiaBan"));
                this.txtTongTienHDB.setText(rs.getString(10));
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
    }//GEN-LAST:event_tbHDBMouseClicked

    private void btLamMoiHDNActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btLamMoiHDNActionPerformed
        this.btThemHDN.setEnabled(true);
        this.btSuaHDN.setEnabled(false);
        this.btXoaHDN.setEnabled(false);
        this.txtMaHDN.setText(null);
        this.txtMaNVHDN.setText(null);
        this.txtMaNCCHDN.setText(null);
        this.txtMaMTHDN.setText(null);
        this.txtSoLuongHDN.setText(null);
        this.txtNgayNhap.setText(null);
        this.txtDiaChiHDN.setText(null);
        this.txtSDTHDN.setText(null);
        this.txtGiaNhapHDN.setText(null);
        this.txtTongTienHDN.setText(null);
        this.txtTimHDN.setText(null);
        this.txtMaHDN.setEditable(true);
        UpdataTable.LoadData(sqlHDN, tbHDN);
    }//GEN-LAST:event_btLamMoiHDNActionPerformed

    private void btLamMoiHDBActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btLamMoiHDBActionPerformed
        this.btThemHDB.setEnabled(true);
        this.btSuaHDB.setEnabled(false);
        this.btXoaHDB.setEnabled(false);
        this.txtMaHDB.setText(null);
        this.txtMaNVHDB.setText(null);
        this.txtMaKHHDB.setText(null);
        this.txtMaMTHDB.setText(null);
        this.txtSoLuongHDB.setText(null);
        this.txtNgayBan.setText(null);
        this.txtDiaChiHDB.setText(null);
        this.txtSDTHDB.setText(null);
        this.txtGiaBanHDB.setText(null);
        this.txtTongTienHDB.setText(null);
        this.txtTimHDB.setText(null);
        this.txtMaHDB.setEditable(true);
        UpdataTable.LoadData(sqlHDB, tbHDB);
    }//GEN-LAST:event_btLamMoiHDBActionPerformed

    private void btThemHDBActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btThemHDBActionPerformed
       if (this.txtMaHDB.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã hóa đơn không được bỏ trống","Thông báo",1);
       else 
           if(this.txtMaHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được vượt quá 10 ký tự","Thông báo",1);
       else
            if(this.txtMaNVHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaNVHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaKHHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã khách hàng không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaKHHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã khách hàng không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaMTHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMTHDB.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được vượt quá 10 ký tự","Thông báo",1);    
        else 
            if(this.txtSoLuongHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số lượng","Thông báo",1);
        else 
            if(this.txtNgayBan.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập ngày bán","Thông báo",1); 
        else 
            if(this.txtDiaChiHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập địa chỉ","Thông báo",1);
        else 
            if(this.txtSDTHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số điện thoại","Thông báo",1);
        else 
            if(this.txtGiaBanHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập giá bán","Thông báo",1);
      else 
            if(this.txtTongTienHDB.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập tổng tiền","Thông báo",1);
       else
            if(CheckKyTu.CheckKT(this.txtMaHDB.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được nhập ký tự đặt biệt","Thông báo",1);     
            
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn thêm hay không ?","Thông báo",2)==0)
                   HoaDonBan.InsertHDB(this.txtMaHDB.getText().trim(), this.txtMaNVHDB.getText().trim(), this.txtMaKHHDB.getText().trim(), this.txtMaMTHDB.getText().trim(),this.txtSoLuongHDB.getText().trim(),
                           this.txtNgayBan.getText().trim(),this.txtDiaChiHDB.getText().trim(),this.txtSDTHDB.getText().trim(),this.txtGiaBanHDB.getText().trim(),this.txtTongTienHDB.getText());
                   showCT();
                  
                   
               }
    }//GEN-LAST:event_btThemHDBActionPerformed

    private void cbMaNCCPopupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {//GEN-FIRST:event_cbMaNCCPopupMenuWillBecomeInvisible
        String sql = "SELECT * FROM NhaCungCap Where MaNCC = ?";
        LoadCB(sql, this.cbMaNCC, this.txtMaNCCMT, "MaNCC");
//        try {
//            PreparedStatement pst = conn.prepareStatement(sql);
//            pst.setString(1,(String)this.cbMaNCC.getSelectedItem());
//            ResultSet rs = pst.executeQuery();
//            while (rs.next())
//            {
//                this.txtMaNCCMT.setText(rs.getString("MaNCC"));
//            }
//        } catch (Exception e) {
//        }
    }//GEN-LAST:event_cbMaNCCPopupMenuWillBecomeInvisible
//Get giá bán
//  public static Connect connection = new  Connect ();  
//  public int GetGiaSanPham(String MaSP) {
//        int Gia = 0;
//        String cautruyvan = "select * from SanPham where MaSanPham=" + MaSP;
//        ResultSet rs = connection.ExcuteQueryGetTable(cautruyvan);
//        try {
//            if (rs.next()) {
//                Gia = rs.getInt("Giaban");
//            }
//        } catch (SQLException ex) {
//            System.out.println(ex.toString());
//        }
//        return Gia;
//    }
    private void txtSoLuongHDBKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txtSoLuongHDBKeyReleased
//       int SoLuong = 0;
//        double Tien = 0;
//        try {
//            SoLuong = Integer.valueOf(txtSoLuongHDB.getText());
//        } catch (Exception e) {
//        }
//        int Gia = Integer.valueOf(txtGiaBanHDB.getText());
//        Tien = (double) Gia * SoLuong;
//        txtTongTienHDB.setText(String.valueOf(Tien));
    }//GEN-LAST:event_txtSoLuongHDBKeyReleased

    private void txtGiaBanHDBKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txtGiaBanHDBKeyReleased
//       int SoLuong = 0;
//        double Tien = 0;
//        try {
//            SoLuong = Integer.valueOf(txtSoLuongHDB.getText());
//        } catch (Exception e) {
//        }
//        int Gia = Integer.valueOf(txtGiaBanHDB.getText());
//        Tien = (double) Gia * SoLuong;
//        txtTongTienHDB.setText(String.valueOf(Tien));
    }//GEN-LAST:event_txtGiaBanHDBKeyReleased

    private void txtMaHDBKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txtMaHDBKeyReleased
        // TODO add your handling code here:
    }//GEN-LAST:event_txtMaHDBKeyReleased

    private void btLamMoiNCCActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btLamMoiNCCActionPerformed
        this.btThemNCC.setEnabled(true);
        this.btSuaNCC.setEnabled(false);
        this.btXoaNCC.setEnabled(false);
        this.txtMaNCC.setText(null);
        this.txtTenNCC.setText(null);
        this.txtDiaChiNCC.setText(null);
        this.txtSDTNCC.setText(null);
        this.txtMaNCC.setEditable(true);
        UpdataTable.LoadData(sqlNCC, tbNCC);
    }//GEN-LAST:event_btLamMoiNCCActionPerformed

    private void btThemNCCActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btThemNCCActionPerformed
        if (this.txtMaNCC.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMT.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được vượt quá 10 ký tự","Thông báo",1);
        else
            if(this.txtTenNCC.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Tên nhà cung cấp không được bỏ trống","Thông báo",1);
        else
            if(this.txtTenNCC.getText().length()>50)
                JOptionPane.showMessageDialog(null, "Tên nhà cung cấp không được vượt quá 50 ký tự","Thông báo",1);
        else
            if(this.txtDiaChiNCC.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được bỏ trống","Thông báo",1);
        else 
            if(this.txtSDTNCC.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Số điện thoại không được bỏ trống","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtMaNCC.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenNCC.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên nhà cung cấp không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtDiaChiNCC.getText())== true)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được nhập ký tự đặt biệt","Thông báo",1);
        else
           if(CheckSDT.checkNumberPhone(this.txtSDTNCC.getText())== true)
            JOptionPane.showMessageDialog(null, "Số điện thoại không hợp lệ","Thông báo",1);
        
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn thêm hay không ?","Thông báo",2)==0)
                   ThongTinNCC.InsertNCC(this.txtMaNCC.getText().trim(), this.txtTenNCC.getText().trim(), this.txtDiaChiNCC.getText().trim(), this.txtSDTNCC.getText());
                   showCT();
                   
               }
    }//GEN-LAST:event_btThemNCCActionPerformed

    private void btXoaNCCActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btXoaNCCActionPerformed
       if (this.txtMaNCC.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Bạn cần chọn nhà cung cấp cần xóa","Thông báo",1);
       else 
         {
             if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn xóa hay không ?","Thông báo",2)==0)
                ThongTinNCC.DeleteNCC(MaNCC);
                showCT();
                this.btThemNCC.setEnabled(true);
                this.btSuaNCC.setEnabled(false);
                this.btXoaNCC.setEnabled(false);
                this.txtMaNCC.setText(null);
                this.txtTenNCC.setText(null);
                this.txtDiaChiNCC.setText(null);
                this.txtSDTNCC.setText(null);
                this.txtTimNCC.setText(null);

         }
    }//GEN-LAST:event_btXoaNCCActionPerformed

    private void btTimNCCActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btTimNCCActionPerformed
         if(this.txtTimNCC.getText().length()==0)
            JOptionPane.showMessageDialog(null, "Bạn chưa nhập từ khóa cần tìm","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTimNCC.getText())== true)
                JOptionPane.showMessageDialog(null, "Không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            String sql1="SELECT MaNCC as 'Mã nhà cung cấp', TenNCC as 'Tên nhà cung cấp', Diachi as 'Địa chỉ', SDT as 'Số điện thoại'"
                    + "FROM NhaCungCap where MaNCC like N'%"+this.txtTimNCC.getText()+"%' or TenNCC like N'%"+this.txtTimNCC.getText()+"%'";
            UpdataTable.LoadData(sql1, tbNCC);
            
        }
    }//GEN-LAST:event_btTimNCCActionPerformed

    private void tbNCCMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbNCCMouseClicked
        this.btSuaNCC.setEnabled(true);
        this.btXoaNCC.setEnabled(true);
        this.btThemNCC.setEnabled(false);
        this.txtMaNCC.setEditable(false);
        try {
            int row = this.tbNCC.getSelectedRow();//lấy dòng hiện tại mình đang nhấn chuột
            String IDrow = (this.tbNCC.getModel().getValueAt(row, 0)).toString();
            //Lấy giá trị ở dòng i vừa nhấn và lấy giá trị đó đổi ra string. VD ta lấy dc giá trị là TH4
            String sql1="SELECT * FROM NhaCungCap where MaNCC='"+IDrow+"'";
            ResultSet rs = UpdataTable.ShowTextField(sql1);
            
            //Đọc dữ liệu tại dòng có mã TH4
            if(rs.next())//nếu có dữ liệu
            {
                MaNCC = rs.getString("MaNCC");
                this.txtMaNCC.setText(rs.getString("MaNCC"));
                this.txtTenNCC.setText(rs.getString("TenNCC"));
                this.txtDiaChiNCC.setText(rs.getString("DiaChi"));
                this.txtSDTNCC.setText(rs.getString("SDT"));
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
    }//GEN-LAST:event_tbNCCMouseClicked

    private void btThemHDNActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btThemHDNActionPerformed
        if (this.txtMaHDN.getText().length()==0)
     
           JOptionPane.showMessageDialog(null, "Mã hóa đơn không được bỏ trống","Thông báo",1);
       else 
           if(this.txtMaHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được vượt quá 10 ký tự","Thông báo",1);
       else
            if(this.txtMaNVHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaNVHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhân viên không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaMTHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaMTHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã máy tính không được vượt quá 10 ký tự","Thông báo",1);    
        else
            if(this.txtMaNCCHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được bỏ trống","Thông báo",1);
        else 
           if(this.txtMaNCCHDN.getText().length()>10)
                JOptionPane.showMessageDialog(null, "Mã nhà cung cấp không được vượt quá 10 ký tự","Thông báo",1);    
        else 
            if(this.txtSoLuongHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số lượng","Thông báo",1);
        else 
            if(this.txtNgayNhap.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập ngày nhập","Thông báo",1); 
        else 
            if(this.txtDiaChiHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập địa chỉ","Thông báo",1);
        else 
            if(this.txtSDTHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số điện thoại","Thông báo",1);
        else 
            if(this.txtGiaNhapHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập số giá nhập","Thông báo",1);
        else 
            if(this.txtTongTienHDN.getText().length()==0)
                JOptionPane.showMessageDialog(null, "Chưa nhập tổng tiền","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtMaHDN.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã hóa đơn không được nhập ký tự đặt biệt","Thông báo",1);    
            
       else 
               {
                   if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn thêm hay không ?","Thông báo",2)==0)
                   HoaDonNhap.InsertHDN(this.txtMaHDN.getText().trim(), this.txtMaNVHDN.getText().trim(), this.txtMaMTHDN.getText().trim(), this.txtMaNCCHDN.getText().trim(),this.txtSoLuongHDN.getText().trim(),
                           this.txtNgayNhap.getText().trim(),this.txtDiaChiHDN.getText().trim(),this.txtSDTHDN.getText().trim(),this.txtGiaNhapHDN.getText().trim(),this.txtTongTienHDN.getText());
                   showCT();
                   Connect.getConnect();
               }
    }//GEN-LAST:event_btThemHDNActionPerformed

    private void tbHDNMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbHDNMouseClicked
        this.btSuaHDN.setEnabled(true);
        this.btXoaHDN.setEnabled(true);
        this.btThemHDN.setEnabled(false);
        this.txtMaHDN.setEditable(false);
        try {
            int row = this.tbHDN.getSelectedRow();//lấy dòng hiện tại mình đang nhấn chuột
            String IDrow = (this.tbHDN.getModel().getValueAt(row, 0)).toString();
            //Lấy giá trị ở dòng i vừa nhấn và lấy giá trị đó đổi ra string. VD ta lấy dc giá trị là TH4
            String sql1="SELECT * FROM HoaDonNhap where MaHDN='"+IDrow+"'";
            ResultSet rs = UpdataTable.ShowTextField(sql1);
            //Đọc dữ liệu tại dòng có mã TH4
            if(rs.next())//nếu có dữ liệu
            {
                MaHDN = rs.getString("MaHDN");
                this.txtMaHDN.setText(rs.getString("MaHDN"));
                this.txtMaNVHDN.setText(rs.getString("MaNV"));
                this.txtMaNCCHDN.setText(rs.getString("MaNCC"));
                this.txtMaMTHDN.setText(rs.getString("MaMT"));
                this.txtSoLuongHDN.setText(rs.getString("SoLuong"));
                this.txtNgayNhap.setText(rs.getString("NgayNhap"));
                this.txtDiaChiHDN.setText(rs.getString("DiaChi"));
                this.txtSDTHDN.setText(rs.getString("SDT"));
                this.txtGiaNhapHDN.setText(rs.getString("GiaNhap"));
                this.txtTongTienHDN.setText(rs.getString("TongTien"));
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
    }//GEN-LAST:event_tbHDNMouseClicked

    private void tbThongTinMTMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbThongTinMTMouseEntered
        // TODO add your handling code here:
    }//GEN-LAST:event_tbThongTinMTMouseEntered

    private void cbMaNVHDBPopupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {//GEN-FIRST:event_cbMaNVHDBPopupMenuWillBecomeInvisible
      String sql = "SELECT * FROM NhanVien Where MaNV = ?";
        LoadCB(sql, this.cbMaNVHDB, this.txtMaNVHDB, "MaNV");
    }//GEN-LAST:event_cbMaNVHDBPopupMenuWillBecomeInvisible

    private void cbMaKHHDBPopupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {//GEN-FIRST:event_cbMaKHHDBPopupMenuWillBecomeInvisible
        String sql = "SELECT * FROM KhachHang Where MaKH = ?";
        LoadCB(sql, this.cbMaKHHDB, this.txtMaKHHDB, "MaKH");
        LoadCB(sql, this.cbMaKHHDB, this.txtDiaChiHDB, "DiaChi");
        LoadCB(sql, this.cbMaKHHDB, this.txtSDTHDB, "SDT");
    }//GEN-LAST:event_cbMaKHHDBPopupMenuWillBecomeInvisible

    private void cbMaMTHDBPopupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {//GEN-FIRST:event_cbMaMTHDBPopupMenuWillBecomeInvisible
        String sql = "SELECT * FROM ThongTinMayTinh Where MaMT = ?";
        LoadCB(sql, this.cbMaMTHDB, this.txtMaMTHDB, "MaMT");
        LoadCB(sql, this.cbMaMTHDB, this.txtGiaBanHDB, "GiaBan");
    }//GEN-LAST:event_cbMaMTHDBPopupMenuWillBecomeInvisible

    private void tbKHMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbKHMouseClicked

        this.btSuaKH.setEnabled(true);
        this.btXoaKH.setEnabled(true);
        this.btThemKH.setEnabled(false);
        this.txtMaKH.setEditable(false);
        try {
            int row = this.tbKH.getSelectedRow();//lấy dòng hiện tại mình đang nhấn chuột
            String IDrow = (this.tbKH.getModel().getValueAt(row, 0)).toString();
            //Lấy giá trị ở dòng i vừa nhấn và lấy giá trị đó đổi ra string. VD ta lấy dc giá trị là TH4
            String sql1="SELECT * FROM KhachHang where MaKH='"+IDrow+"'";
            ResultSet rs = UpdataTable.ShowTextField(sql1);
            //Đọc dữ liệu tại dòng có mã TH4
            if(rs.next())//nếu có dữ liệu
            {
                MaKH = rs.getString("MaKH");
                this.txtMaKH.setText(rs.getString("MaKH"));
                this.txtTenKH.setText(rs.getString("TenKH"));
                this.txtGioiTinhKH.setText(rs.getString("Gioitinh"));
                this.txtDiaChiKH.setText(rs.getString("Diachi"));
                this.txtSDTKH.setText(rs.getString("SDT"));
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
    }//GEN-LAST:event_tbKHMouseClicked

    private void btXoaKHActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btXoaKHActionPerformed
        if (this.txtMaKH.getText().length()==0)

        JOptionPane.showMessageDialog(null, "Bạn cần chọn khách hàng để xóa","Thông báo",1);
        else
        {
            if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn xóa hay không ?","Thông báo",2)==0)
            ThongTinKH.DeleteKH(MaKH);
            showCT();
            this.btThemKH.setEnabled(true);
            this.btSuaKH.setEnabled(false);
            this.btXoaKH.setEnabled(false);
            this.txtMaKH.setText(null);
            this.txtTenKH.setText(null);
            this.txtGioiTinhKH.setText(null);
            this.txtDiaChiKH.setText(null);
            this.txtSDTKH.setText(null);
            this.txtTimKH.setText(null);

        }
    }//GEN-LAST:event_btXoaKHActionPerformed

    private void btTimKHActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btTimKHActionPerformed

        if(this.txtTimKH.getText().length()==0 )
        JOptionPane.showMessageDialog(null, "Bạn chưa nhập từ khóa cần tìm","Thông báo",1);
        else
        if(CheckKyTu.CheckKT(this.txtTim.getText())== true)
        JOptionPane.showMessageDialog(null, "Không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            String sql1="SELECT MaKH as 'Mã khách hàng', TenKH as 'Tên khách hàng', Gioitinh as 'Giới tính', Diachi as 'Địa chỉ', SDT as 'Số điện thoại'"
                    + " FROM KhachHang where MaKH like N'%"+this.txtTimKH.getText()+"%' or TenKH like N'%"+this.txtTimKH.getText()+"%'";
            UpdataTable.LoadData(sql1, tbKH);

        }
    }//GEN-LAST:event_btTimKHActionPerformed

    private void btSuaKHActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btSuaKHActionPerformed
         if (this.txtMaKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Mã khách hàng không được bỏ trống","Thông báo",1);
        else
        if(this.txtMaKH.getText().length()>10)
        JOptionPane.showMessageDialog(null, "Mã khách hàng phải có độ dài từ 4 đến 10 ký tự","Thông báo",1);
        else
        if(this.txtMaKH.getText().length()<4)
        JOptionPane.showMessageDialog(null, "Mã khách hàng phải có độ dài từ 4 đến 10 ký tự","Thông báo",1);
        else
        if(this.txtTenKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Tên khách hàng không được bỏ trống","Thông báo",1);
        else
        if(this.txtTenKH.getText().length()< 2)
        JOptionPane.showMessageDialog(null, "Tên khách hàng phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);
        else
        if(this.txtTenKH.getText().length()> 25)
        JOptionPane.showMessageDialog(null, "Tên khách hàng phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);
        else
        if(this.txtGioiTinhKH.getText().length()==0 )
        JOptionPane.showMessageDialog(null, "Chưa nhập giới tính ","Thông báo",1);
        else
        if(this.txtDiaChiKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Địa chỉ khách hàng không được bỏ trống","Thông báo",1);
        else
        if(this.txtDiaChiKH.getText().length()>50)
        JOptionPane.showMessageDialog(null, "Địa chỉ khách hàng không được quá 50 ký tự","Thông báo",1);
        else
        if(this.txtSDTKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Số điện thoại không được bỏ trống","Thông báo",1);
        else
        if(CheckSDT.checkNumberPhone(this.txtSDTKH.getText())== true)
        JOptionPane.showMessageDialog(null, "Số điện thoại không hợp lệ","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtMaKH.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã khách hàng không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenKH.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên khách hàng không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtDiaChiKH.getText())== true)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn sửa hay không ?","Thông báo",2)==0)
            ThongTinKH.UpdateKH(MaKH,this.txtMaKH.getText().trim(), this.txtTenKH.getText().trim(), this.txtGioiTinhKH.getText().trim(), this.txtDiaChiKH.getText().trim(), this.txtSDTKH.getText());
            showCT();

        }
    }//GEN-LAST:event_btSuaKHActionPerformed

    private void btThemKHActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btThemKHActionPerformed
        

        if (this.txtMaKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Mã khách hàng không được bỏ trống","Thông báo",1);
        else
        if(this.txtMaKH.getText().length()>10)
        JOptionPane.showMessageDialog(null, "Mã khách hàng phải có độ dài từ 4 đến 10 ký tự","Thông báo",1);
        else
        if(this.txtMaKH.getText().length()<4)
        JOptionPane.showMessageDialog(null, "Mã khách hàng phải có độ dài từ 4 đến 10 ký tự","Thông báo",1);
        else
        if(this.txtTenKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Tên khách hàng không được bỏ trống","Thông báo",1);
        else
        if(this.txtTenKH.getText().length()< 2)
        JOptionPane.showMessageDialog(null, "Tên khách hàng phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);
        else
        if(this.txtTenKH.getText().length()> 25)
        JOptionPane.showMessageDialog(null, "Tên khách hàng phải có độ dài từ 2 đến 25 ký tự","Thông báo",1);
        else
        if(this.txtGioiTinhKH.getText().length()==0 )
        JOptionPane.showMessageDialog(null, "Chưa nhập giới tính ","Thông báo",1);
        else
        if(this.txtDiaChiKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Địa chỉ khách hàng không được bỏ trống","Thông báo",1);
        else
        if(this.txtDiaChiKH.getText().length()>50)
        JOptionPane.showMessageDialog(null, "Địa chỉ khách hàng không được quá 50 ký tự","Thông báo",1);
        else
        if(this.txtSDTKH.getText().length()==0)
        JOptionPane.showMessageDialog(null, "Số điện thoại không được bỏ trống","Thông báo",1);
        else
        if(CheckSDT.checkNumberPhone(this.txtSDTKH.getText())== true)
        JOptionPane.showMessageDialog(null, "Số điện thoại không hợp lệ","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtMaKH.getText())== true)
                JOptionPane.showMessageDialog(null, "Mã khách hàng không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtTenKH.getText())== true)
                JOptionPane.showMessageDialog(null, "Tên khách hàng không được nhập ký tự đặt biệt","Thông báo",1);
        else
            if(CheckKyTu.CheckKT(this.txtDiaChiKH.getText())== true)
                JOptionPane.showMessageDialog(null, "Địa chỉ không được nhập ký tự đặt biệt","Thông báo",1);
        else
        {
            if(JOptionPane.showConfirmDialog(null, "Bạn có chắc chắn muốn thêm hay không ?","Thông báo",2)==0)
            ThongTinKH.InsertKH(this.txtMaKH.getText().trim(), this.txtTenKH.getText().trim(), this.txtGioiTinhKH.getText().trim(), this.txtDiaChiKH.getText().trim(), this.txtSDTKH.getText());

            showCT();

        }
    }//GEN-LAST:event_btThemKHActionPerformed

    private void btLamMoiKHActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btLamMoiKHActionPerformed
        this.btThemKH.setEnabled(true);
        this.btSuaKH.setEnabled(false);
        this.btXoaKH.setEnabled(false);
        this.txtMaKH.setText(null);
        this.txtTenKH.setText(null);
        this.txtGioiTinhKH.setText(null);
        this.txtDiaChiKH.setText(null);
        this.txtSDTKH.setText(null);
        this.txtTimKH.setText(null);
        this.txtMaKH.setEditable(true);
        UpdataTable.LoadData(sqlKH, tbKH);
    }//GEN-LAST:event_btLamMoiKHActionPerformed

    private void btXoaHDBActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btXoaHDBActionPerformed
      if (this.txtMaHDB.getText().length()==0)

        JOptionPane.showMessageDialog(null, "Bạn cần chọn hóa đơn để xóa","Thông báo",1);
        else
        {
            if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn xóa hay không ?","Thông báo",2)==0)
            HoaDonBan.DeleteHDB(MaHDB);
            showCT();
            this.btThemHDB.setEnabled(true);
            this.btSuaHDB.setEnabled(false);
            this.btXoaHDB.setEnabled(false);
            this.txtMaHDB.setText(null);
            this.txtMaNVHDB.setText(null);
            this.txtMaKHHDB.setText(null);
            this.txtMaMTHDB.setText(null);
            this.txtSoLuongHDB.setText(null);
            this.txtNgayBan.setText(null);
            this.txtDiaChiHDB.setText(null);
            this.txtSDTHDB.setText(null);
            this.txtGiaBanHDB.setText(null);
            this.txtTongTienHDB.setText(null);
            this.txtTimHDB.setText(null);

        }
    }//GEN-LAST:event_btXoaHDBActionPerformed

    private void cbMaNVHDNPopupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {//GEN-FIRST:event_cbMaNVHDNPopupMenuWillBecomeInvisible
       String sql = "SELECT * FROM NhanVien Where MaNV = ?";
       LoadCB(sql, this.cbMaNVHDN, this.txtMaNVHDN, "MaNV");
    }//GEN-LAST:event_cbMaNVHDNPopupMenuWillBecomeInvisible

    private void cbMaMTHDNPopupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {//GEN-FIRST:event_cbMaMTHDNPopupMenuWillBecomeInvisible
       String sql = "SELECT * FROM ThongTinMayTinh Where MaMT = ?";
        LoadCB(sql, this.cbMaMTHDN, this.txtMaMTHDN, "MaMT");
        LoadCB(sql, this.cbMaMTHDN, this.txtGiaNhapHDN, "Gianhap");
    }//GEN-LAST:event_cbMaMTHDNPopupMenuWillBecomeInvisible

    private void cbMaNCCHDNPopupMenuWillBecomeInvisible(javax.swing.event.PopupMenuEvent evt) {//GEN-FIRST:event_cbMaNCCHDNPopupMenuWillBecomeInvisible
        String sql = "SELECT * FROM NhaCungCap Where MaNCC = ?";
        LoadCB(sql, this.cbMaNCCHDN, this.txtMaNCCHDN, "MaNCC");
        LoadCB(sql, this.cbMaNCCHDN, this.txtDiaChiHDN, "DiaChi");
        LoadCB(sql, this.cbMaNCCHDN, this.txtSDTHDN, "SDT");
    }//GEN-LAST:event_cbMaNCCHDNPopupMenuWillBecomeInvisible

    private void btXoaHDNActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btXoaHDNActionPerformed
       if (this.txtMaHDN.getText().length()==0)

        JOptionPane.showMessageDialog(null, "Bạn cần chọn hóa đơn để xóa","Thông báo",1);
        else
        {
            if(JOptionPane.showConfirmDialog(null, "Bạn có chắc muốn xóa hay không ?","Thông báo",2)==0)
            HoaDonNhap.DeleteHDN(MaHDN);
            showCT();
            this.btThemHDN.setEnabled(true);
            this.btSuaHDN.setEnabled(false);
            this.btXoaHDN.setEnabled(false);
            this.txtMaHDN.setText(null);
            this.txtMaNVHDN.setText(null);
            this.txtMaNCCHDN.setText(null);
            this.txtMaMTHDN.setText(null);
            this.txtSoLuongHDN.setText(null);
            this.txtNgayNhap.setText(null);
            this.txtDiaChiHDN.setText(null);
            this.txtSDTHDN.setText(null);
            this.txtGiaNhapHDN.setText(null);
            this.txtTongTienHDN.setText(null);
            this.txtTimHDN.setText(null);

        }
    }//GEN-LAST:event_btXoaHDNActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(jfrmQuanLyBanMT.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(jfrmQuanLyBanMT.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(jfrmQuanLyBanMT.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(jfrmQuanLyBanMT.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new jfrmQuanLyBanMT().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btLamMoi;
    private javax.swing.JButton btLamMoiHDB;
    private javax.swing.JButton btLamMoiHDN;
    private javax.swing.JButton btLamMoiKH;
    private javax.swing.JButton btLamMoiNCC;
    private javax.swing.JButton btLamMoiNV;
    private javax.swing.JButton btSua;
    private javax.swing.JButton btSuaHDB;
    private javax.swing.JButton btSuaHDN;
    private javax.swing.JButton btSuaKH;
    private javax.swing.JButton btSuaNCC;
    private javax.swing.JButton btSuaNV;
    private javax.swing.JButton btThem;
    private javax.swing.JButton btThemHDB;
    private javax.swing.JButton btThemHDN;
    private javax.swing.JButton btThemKH;
    private javax.swing.JButton btThemNCC;
    private javax.swing.JButton btThemNV;
    private javax.swing.JButton btTim;
    private javax.swing.JButton btTimHDB;
    private javax.swing.JButton btTimHDN;
    private javax.swing.JButton btTimKH;
    private javax.swing.JButton btTimNCC;
    private javax.swing.JButton btTimNV;
    private javax.swing.JButton btXoa;
    private javax.swing.JButton btXoaHDB;
    private javax.swing.JButton btXoaHDN;
    private javax.swing.JButton btXoaKH;
    private javax.swing.JButton btXoaNCC;
    private javax.swing.JButton btXoaNV;
    private javax.swing.ButtonGroup buttonGroup1;
    private javax.swing.ButtonGroup buttonGroup2;
    private javax.swing.JComboBox<String> cbMaKHHDB;
    private javax.swing.JComboBox<String> cbMaMTHDB;
    private javax.swing.JComboBox<String> cbMaMTHDN;
    private javax.swing.JComboBox<String> cbMaNCC;
    private javax.swing.JComboBox<String> cbMaNCCHDN;
    private javax.swing.JComboBox<String> cbMaNVHDB;
    private javax.swing.JComboBox<String> cbMaNVHDN;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel14;
    private javax.swing.JLabel jLabel15;
    private javax.swing.JLabel jLabel16;
    private javax.swing.JLabel jLabel17;
    private javax.swing.JLabel jLabel18;
    private javax.swing.JLabel jLabel19;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel20;
    private javax.swing.JLabel jLabel21;
    private javax.swing.JLabel jLabel22;
    private javax.swing.JLabel jLabel23;
    private javax.swing.JLabel jLabel24;
    private javax.swing.JLabel jLabel25;
    private javax.swing.JLabel jLabel26;
    private javax.swing.JLabel jLabel27;
    private javax.swing.JLabel jLabel28;
    private javax.swing.JLabel jLabel29;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel30;
    private javax.swing.JLabel jLabel31;
    private javax.swing.JLabel jLabel32;
    private javax.swing.JLabel jLabel33;
    private javax.swing.JLabel jLabel34;
    private javax.swing.JLabel jLabel35;
    private javax.swing.JLabel jLabel36;
    private javax.swing.JLabel jLabel37;
    private javax.swing.JLabel jLabel38;
    private javax.swing.JLabel jLabel39;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel40;
    private javax.swing.JLabel jLabel41;
    private javax.swing.JLabel jLabel42;
    private javax.swing.JLabel jLabel43;
    private javax.swing.JLabel jLabel44;
    private javax.swing.JLabel jLabel45;
    private javax.swing.JLabel jLabel46;
    private javax.swing.JLabel jLabel47;
    private javax.swing.JLabel jLabel48;
    private javax.swing.JLabel jLabel49;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel50;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JPanel jPanel5;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JScrollPane jScrollPane4;
    private javax.swing.JScrollPane jScrollPane5;
    private javax.swing.JScrollPane jScrollPane6;
    private javax.swing.JPanel jTPDangXuat;
    private javax.swing.JTabbedPane jTPHoaDon;
    private javax.swing.JTabbedPane jTPKhachHang;
    private javax.swing.JTabbedPane jTPNhaCC;
    private javax.swing.JTabbedPane jTPNhanVien;
    private javax.swing.JPanel pThongTinMT;
    private javax.swing.JTable tbHDB;
    private javax.swing.JTable tbHDN;
    private javax.swing.JTable tbKH;
    private javax.swing.JTable tbNCC;
    private javax.swing.JTable tbNV;
    private javax.swing.JTable tbThongTinMT;
    private javax.swing.JTabbedPane tpQuanLy;
    private javax.swing.JTabbedPane tpSanPham;
    private javax.swing.JTextField txtDiaChiHDB;
    private javax.swing.JTextField txtDiaChiHDN;
    private javax.swing.JTextField txtDiaChiKH;
    private javax.swing.JTextField txtDiaChiNCC;
    private javax.swing.JTextField txtDiaChiNV;
    private javax.swing.JTextField txtGiaBan;
    private javax.swing.JTextField txtGiaBanHDB;
    private javax.swing.JTextField txtGiaNhap;
    private javax.swing.JTextField txtGiaNhapHDN;
    private javax.swing.JTextField txtGioiTinhKH;
    private javax.swing.JTextField txtGioiTinhNV;
    private javax.swing.JTextField txtMaHDB;
    private javax.swing.JTextField txtMaHDN;
    private javax.swing.JTextField txtMaKH;
    private javax.swing.JTextField txtMaKHHDB;
    private javax.swing.JTextField txtMaMT;
    private javax.swing.JTextField txtMaMTHDB;
    private javax.swing.JTextField txtMaMTHDN;
    private javax.swing.JTextField txtMaNCC;
    private javax.swing.JTextField txtMaNCCHDN;
    private javax.swing.JTextField txtMaNCCMT;
    private javax.swing.JTextField txtMaNV;
    private javax.swing.JTextField txtMaNVHDB;
    private javax.swing.JTextField txtMaNVHDN;
    private javax.swing.JTextField txtNgayBan;
    private javax.swing.JTextField txtNgayNhap;
    private javax.swing.JTextField txtSDTHDB;
    private javax.swing.JTextField txtSDTHDN;
    private javax.swing.JTextField txtSDTKH;
    private javax.swing.JTextField txtSDTNCC;
    private javax.swing.JTextField txtSDTNV;
    private javax.swing.JTextField txtSoLuong;
    private javax.swing.JTextField txtSoLuongHDB;
    private javax.swing.JTextField txtSoLuongHDN;
    private javax.swing.JTextField txtTenKH;
    private javax.swing.JTextField txtTenMT;
    private javax.swing.JTextField txtTenNCC;
    private javax.swing.JTextField txtTenNV;
    private javax.swing.JTextField txtTim;
    private javax.swing.JTextField txtTimHDB;
    private javax.swing.JTextField txtTimHDN;
    private javax.swing.JTextField txtTimKH;
    private javax.swing.JTextField txtTimNCC;
    private javax.swing.JTextField txtTimNV;
    private javax.swing.JTextField txtTongTienHDB;
    private javax.swing.JTextField txtTongTienHDN;
    // End of variables declaration//GEN-END:variables


   
}            
   
