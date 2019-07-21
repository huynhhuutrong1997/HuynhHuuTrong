package Services;

import java.sql.Date;
import java.sql.SQLException;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import DAO.HopDongLDDAO;
import Entities.HopDongLaoDong;
import Imp.HopDongLDImp;

@Service
public class HopDongLDService implements HopDongLDImp {
	
	@Autowired
	HopDongLDDAO hopdongldDAO;

	public List<HopDongLaoDong> LayDanhSachHD() {
		
		return hopdongldDAO.LayDanhSachHD();
	}

	public boolean ThemHD(HopDongLaoDong hopdong)  {
		boolean kt = hopdongldDAO.ThemHD(hopdong);
		return kt;
	}

	public HopDongLaoDong LayHD(String mahd) {
		// TODO Auto-generated method stub
		return hopdongldDAO.LayHD(mahd);
	}

	public HopDongLaoDong SuaHD(String mahd, String nhanvien, String loaihd, int thoigian, Date tungay, Date denngay) {
		// TODO Auto-generated method stub
		return hopdongldDAO.SuaHD(mahd, nhanvien, loaihd, thoigian, tungay, denngay);
	}

	public HopDongLaoDong XoaHD(String mahd) {
		// TODO Auto-generated method stub
		return hopdongldDAO.XoaHD(mahd);
	}
	

}
