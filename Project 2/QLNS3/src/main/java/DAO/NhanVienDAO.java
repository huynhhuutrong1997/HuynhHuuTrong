package DAO;

import java.sql.Date;
import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Scope;
import org.springframework.context.annotation.ScopedProxyMode;
import org.springframework.stereotype.Repository;
import org.springframework.transaction.annotation.Transactional;

import Entities.BangLuong;
import Entities.ChucVu;
import Entities.NhanVien;
import Entities.PhongBan;
import Entities.TrinhDoHocVan;
import Imp.NhanVienImp;

@Repository
@Scope(proxyMode = ScopedProxyMode.TARGET_CLASS)
public class NhanVienDAO implements NhanVienImp{
	
	@Autowired
	SessionFactory sessionFactory;
	
	@Transactional
	public List<NhanVien> LayDanhSachNhanVien() {
	
		Session session = sessionFactory.getCurrentSession();
		try {
			List<NhanVien> listNhanVien = (List<NhanVien>) session.createQuery("from NhanVien").getResultList();
			return listNhanVien;
		} catch (Exception e) {
			return null;
		}
		
	}
	
	@Transactional
	public NhanVien XoaNhanVien(String manv) {
		Session session = sessionFactory.getCurrentSession();
		try {
			NhanVien xoanhanvien = session.get(NhanVien.class, manv);
			session.delete(xoanhanvien);
			return xoanhanvien;
			
		} catch (Exception e) {
			return null;
		}
		
		
	}
	@Transactional
	public NhanVien LayNhanVien(String manv) {
		
		Session session = sessionFactory.getCurrentSession();
		try {
			NhanVien nhanvien = (NhanVien) session.createQuery("from NhanVien where MaNV='"+manv+"'").getSingleResult();
			return nhanvien;
		} catch (Exception e) {
			return null;
		}
		
		
		
		
		
	}
	@Transactional
	public boolean ThemNhanVien(NhanVien nhanvien) {
		Session session = sessionFactory.getCurrentSession();	
		try {	
			String manv = (String) session.save(nhanvien);
			if(manv !=null) {
				return true;
			}else {
				return false;
			}
		}catch (Exception e) {
			System.out.println(e);
				return false;
	}
	}

	@Transactional
	public NhanVien SuaNhanVien(String manv, String hinhanh, String honv, String tennv, String gioitinh, String dantoc,
			Date ngaysinh, String quequan, String diachi, String sdt, String email, String phongban, String chucvu,
			String trinhdohv, String maluong, String cmnd, String diemmanh, String diemyeu, Date ngayvaoct,
			float bacluong, float bacphucap) {
			Session session = sessionFactory.getCurrentSession();
			
			
		try {
			NhanVien nhanvien = (NhanVien) session.createQuery("from NhanVien where manv='"+manv+"'").getSingleResult();
			if(hinhanh != "") {
			nhanvien.setAnh(hinhanh);
			}
			nhanvien.setHonv(honv);
			nhanvien.setTennv(tennv);
			nhanvien.setGioitinh(gioitinh);
			nhanvien.setDantoc(dantoc);
			nhanvien.setNgaysinh(ngaysinh);
			nhanvien.setQuequan(quequan);
			nhanvien.setDiachithuongtru(diachi);
			nhanvien.setSdt(sdt);
			nhanvien.setEmail(email);
			PhongBan phongbanadd = new PhongBan();
			phongbanadd.setMapb(phongban);
			nhanvien.setPhongban(phongbanadd);
			ChucVu chucvuadd = new ChucVu();
			chucvuadd.setMacv(chucvu);
			nhanvien.setChucvu(chucvuadd);
			TrinhDoHocVan trinhdohocvanadd = new TrinhDoHocVan();
			trinhdohocvanadd.setMatdhv(trinhdohv);
			nhanvien.setTrinhdohocvan(trinhdohocvanadd);
			BangLuong bangluongadd = new BangLuong();
			bangluongadd.setMaluong(maluong);
			nhanvien.setBangluong(bangluongadd);
			nhanvien.setDiemmanh(diemmanh);
			nhanvien.setDiemyeu(diemyeu);
			nhanvien.setNgayvaocongty(ngayvaoct);
			nhanvien.setBacluong(bacluong);
			nhanvien.setBacphucap(bacphucap);
			session.update(nhanvien);
			return nhanvien;
		} catch (Exception e) {
			return null;
		}
			
	}

}
