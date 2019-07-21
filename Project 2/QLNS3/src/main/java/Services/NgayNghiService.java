package Services;

import java.sql.Date;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import DAO.NgayNghiDAO;
import Entities.NgayNghi;
import Imp.NgayNghiImp;

@Service
public class NgayNghiService implements NgayNghiImp {
	@Autowired
	NgayNghiDAO ngaynghiDAO;

	public NgayNghi LayDanhSachNhanVien(Date ngaynghi) {
		NgayNghi NgayNghi = ngaynghiDAO.LayDanhSachNhanVien(ngaynghi);
		return NgayNghi;
	}

	public boolean ThemNgayNghi(NgayNghi ngaynghi) {
		return ngaynghiDAO.ThemNgayNghi(ngaynghi);
	}

	public List<NgayNghi> LayNgayNghi(int thang) {
		// TODO Auto-generated method stub
		return ngaynghiDAO.LayNgayNghi(thang);
	}

	public boolean XoaNgayNghi(int mann) {
		
		return ngaynghiDAO.XoaNgayNghi(mann);
	}

	

}
