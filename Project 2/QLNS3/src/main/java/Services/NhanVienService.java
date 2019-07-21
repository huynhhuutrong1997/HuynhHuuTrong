package Services;

import java.sql.Date;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import DAO.NhanVienDAO;
import Entities.NhanVien;
import Imp.NhanVienImp;

@Service
public class NhanVienService implements NhanVienImp {

	@Autowired
	NhanVienDAO nhanvienDAO;
	
	public List<NhanVien> LayDanhSachNhanVien() {
		
		return nhanvienDAO.LayDanhSachNhanVien();
	}

	public NhanVien XoaNhanVien(String manv) {
		
		return nhanvienDAO.XoaNhanVien(manv);
	}

	public NhanVien LayNhanVien(String manv) {
		
		return nhanvienDAO.LayNhanVien(manv);
	}

	public boolean ThemNhanVien(NhanVien nhanvien) {
		boolean kiemtra = nhanvienDAO.ThemNhanVien(nhanvien);
		return kiemtra;
	}

	public NhanVien SuaNhanVien(String manv, String hinhanh, String honv, String tennv, String gioitinh, String dantoc, 
			 Date ngaysinh, String quequan, String diachi, String sdt, String email, String phongban, String chucvu,
			 String trinhdohv, String maluong, String cmnd,  String diemmanh, String diemyeu, Date ngayvaoct ,
			 float bacluong, float bacphucap) {
		
		return nhanvienDAO.SuaNhanVien(manv, hinhanh, honv, tennv, gioitinh, dantoc, ngaysinh, quequan, diachi, sdt,
				email, phongban, chucvu, trinhdohv, maluong, cmnd, diemmanh, diemyeu, ngayvaoct, bacluong, bacphucap);
	}

}
