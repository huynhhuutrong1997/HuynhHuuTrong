package Imp;

import java.sql.Date;
import java.util.List;

import Entities.NgayNghi;

public interface NgayNghiImp {
	NgayNghi LayDanhSachNhanVien(Date ngaynghi);

	boolean ThemNgayNghi(NgayNghi ngaynghi);
	
	List<NgayNghi> LayNgayNghi(int thang);
	
	boolean XoaNgayNghi(int mann);

}
