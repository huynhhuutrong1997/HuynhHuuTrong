package Imp;

import java.util.List;

import Entities.ChucVu;

public interface ChucVuImp {

	List<ChucVu> LayDanhChucVu();
	
	boolean ThemCV(ChucVu chucvu);
	
	ChucVu LayCV(String macv);
	
	ChucVu SuaCV(String macv, String tencv, String mota);
	
	ChucVu XoaCV(String macv);
}
