package Imp;

import Entities.TaiKhoan;

public interface DangNhapImp {
	
	boolean DangNhap(String tentaikhoan, String matkhau);
	TaiKhoan LayTaiKhoan(String tentaikhoan,String matkhau);
	
}
