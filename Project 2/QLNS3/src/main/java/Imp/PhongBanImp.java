package Imp;

import java.util.List;

import Entities.PhongBan;

public interface PhongBanImp {
	
	List<PhongBan> LayDanhSachPhongBan();
	
	boolean ThemPB(PhongBan phongban);
	
	PhongBan LayPB(String mapb);
	
	PhongBan SuaPB(String mapb, String tenpb, String sdtpb);
	
	PhongBan XoaPB(String mapb);

}
