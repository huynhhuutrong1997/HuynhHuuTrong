package Services;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import DAO.DangNhapDAO;
import Entities.TaiKhoan;
import Imp.DangNhapImp;

@Service
public class DangNhapService implements DangNhapImp{
	
	@Autowired
	DangNhapDAO dangnhapDAO;
	
	public boolean DangNhap(String tentaikhoan, String matkhau) {
		
		boolean kiemtra = dangnhapDAO.DangNhap(tentaikhoan, matkhau);
		return kiemtra;
	}

	public TaiKhoan LayTaiKhoan(String tentaikhoan, String matkhau) {
		// TODO Auto-generated method stub
		return dangnhapDAO.LayTaiKhoan(tentaikhoan, matkhau);
	}

	
	
	
}
