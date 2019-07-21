package Services;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import DAO.DangKyDAO;
import Entities.TaiKhoan;
import Imp.DangKyImp;

@Service
public class DangKyService implements DangKyImp {
	@Autowired
	DangKyDAO dangkyDAO;
	
	public boolean DangKy(TaiKhoan taikhoan) {
		boolean kiemtra = dangkyDAO.DangKy(taikhoan); 
		return kiemtra;
	}
	

}
