package Services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import DAO.PhongBanDAO;
import Entities.PhongBan;
import Imp.PhongBanImp;

@Service
public class PhongBanService implements PhongBanImp{
	
	@Autowired
	PhongBanDAO phongbanDAO;

	public List<PhongBan> LayDanhSachPhongBan() {
		
		return phongbanDAO.LayDanhSachPhongBan();
	}

	public boolean ThemPB(PhongBan phongban) {
		boolean kiemtra = phongbanDAO.ThemPB(phongban);
		
		return kiemtra;
	}

	public PhongBan LayPB(String mapb) {
		
		return phongbanDAO.LayPB(mapb);
	}

	public PhongBan SuaPB(String mapb, String tenpb, String sdtpb) {
		
		return phongbanDAO.SuaPB(mapb, tenpb, sdtpb);
	}

	public PhongBan XoaPB(String mapb) {
		
		return phongbanDAO.XoaPB(mapb);
	} 

}
