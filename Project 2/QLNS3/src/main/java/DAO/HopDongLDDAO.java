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

import Entities.HopDongLaoDong;
import Entities.NhanVien;
import Imp.HopDongLDImp;

@Repository
@Scope(proxyMode = ScopedProxyMode.TARGET_CLASS)
public class HopDongLDDAO implements HopDongLDImp{
	
	@Autowired
	SessionFactory sessionFactory;

	@Transactional
	public List<HopDongLaoDong> LayDanhSachHD() {
		Session session = sessionFactory.getCurrentSession();
		try {
			List<HopDongLaoDong> listHopDong = (List<HopDongLaoDong>) session.createQuery("from HopDongLaoDong").getResultList();
			return listHopDong;
		} catch (Exception e) {
			return null;
		}
		
	}

	@Transactional
	public boolean ThemHD(HopDongLaoDong hopdong) {
		Session session = sessionFactory.getCurrentSession();
		try {	
			String mahd = (String) session.save(hopdong);
			if(mahd !=null) {
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
	public HopDongLaoDong LayHD(String mahd) {
		Session session = sessionFactory.getCurrentSession();
		try {
			HopDongLaoDong hopdong = (HopDongLaoDong) session.createQuery("from HopDongLaoDong where mahopdong='"+mahd+"'").getSingleResult();
			return hopdong;
		} catch (Exception e) {
			return null;
		}
		
	}

	@Transactional
	public HopDongLaoDong SuaHD(String mahd, String nhanvien, String loaihd, int thoigian, Date tungay, Date denngay) {
		Session session = sessionFactory.getCurrentSession();
		try {
			HopDongLaoDong hopdong = (HopDongLaoDong) session.createQuery("from HopDongLaoDong where mahopdong='"+mahd+"'").getSingleResult();
			hopdong.setLoaihopdong(loaihd);
			NhanVien nhanvien1 = new NhanVien();
			nhanvien1.setManv(nhanvien);
			hopdong.setNhanvien(nhanvien1);
			hopdong.setThoigian(thoigian);
			hopdong.setTungay(tungay);
			hopdong.setDenngay(denngay);
			session.update(hopdong);
			return hopdong;
		} catch (Exception e) {
			return null;
		}
	}

	@Transactional
	public HopDongLaoDong XoaHD(String mahd) {
		Session session = sessionFactory.getCurrentSession();
		try {
			HopDongLaoDong xoahd = session.get(HopDongLaoDong.class, mahd);
			session.delete(xoahd);
			return xoahd;
		} catch (Exception e) {
			return null;
		}

	}

}
