package Imp;

import java.util.List;

import Entities.TaiKhoan;

public interface TaiKhoanImp {
	
	List<TaiKhoan> LayDanhTaiKhoan();
	
	TaiKhoan XoaTaiKhoan( String tentaikhoan);
	
	TaiKhoan LayTaiKhoan(String tentaikhoan );
	
	TaiKhoan SuaTaiKhoan(String tentaikhoan, String matkhau ,String quyen);
	
	TaiKhoan DoiMK(String tentaikhoan, String matkhau);
	
	boolean ThemTaiKhoan(TaiKhoan taikhoan);
}
