package Imp;

import java.sql.Date;
import java.util.List;


import Entities.NhanVien;

public interface NhanVienImp {
	
	List<NhanVien> LayDanhSachNhanVien();
	
	NhanVien LayNhanVien(String manv);
	
	NhanVien XoaNhanVien(String manv);
	
	boolean ThemNhanVien(NhanVien nhanvien);
	
	NhanVien SuaNhanVien(String manv, String hinhanh, String honv, String tennv, String gioitinh, String dantoc, 
		 Date ngaysinh, String quequan, String diachi, String sdt, String email, String phongban, String chucvu,
		 String trinhdohv, String maluong, String cmnd,  String diemmanh, String diemyeu, Date ngayvaoct ,
		 float bacluong, float bacphucap);
}
