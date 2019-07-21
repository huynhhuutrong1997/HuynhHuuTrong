package Imp;

import java.util.List;

import Entities.TrinhDoHocVan;

public interface TrinhDoHocVanImp {
	
	List<TrinhDoHocVan> LayDSTrinhDoHV();

	boolean ThemHV(TrinhDoHocVan hocvan);
	
	TrinhDoHocVan LayHocVan(String mahv);
	
	TrinhDoHocVan SuaHV(String mahv, String tenhv, String chuyennganh);
	
	TrinhDoHocVan XoaHV(String mahv);
}
