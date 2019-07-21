package Services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import DAO.TrinhDoHocVanDAO;
import Entities.TrinhDoHocVan;
import Imp.TrinhDoHocVanImp;

@Service
public class TrinhDoHocVanService implements TrinhDoHocVanImp{
	
	@Autowired
	TrinhDoHocVanDAO trinhdohocvanDAO;

	public List<TrinhDoHocVan> LayDSTrinhDoHV() {
		
		return trinhdohocvanDAO.LayDSTrinhDoHV();
	}

	public boolean ThemHV(TrinhDoHocVan hocvan) {
		boolean kt = trinhdohocvanDAO.ThemHV(hocvan);
		return kt;
	}

	public TrinhDoHocVan LayHocVan(String mahv) {
		// TODO Auto-generated method stub
		return trinhdohocvanDAO.LayHocVan(mahv);
	}

	public TrinhDoHocVan SuaHV(String mahv, String tenhv, String chuyennganh) {
		// TODO Auto-generated method stub
		return trinhdohocvanDAO.SuaHV(mahv, tenhv, chuyennganh);
	}

	public TrinhDoHocVan XoaHV(String mahv) {
		// TODO Auto-generated method stub
		return trinhdohocvanDAO.XoaHV(mahv);
	}
	

}
