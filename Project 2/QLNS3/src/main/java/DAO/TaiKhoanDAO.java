package DAO;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Scope;
import org.springframework.context.annotation.ScopedProxyMode;
import org.springframework.stereotype.Repository;
import org.springframework.transaction.annotation.Transactional;

import Entities.TaiKhoan;
import Imp.TaiKhoanImp;

@Repository
@Scope(proxyMode = ScopedProxyMode.TARGET_CLASS)
public class TaiKhoanDAO implements TaiKhoanImp{

	@Autowired
	SessionFactory sessionFactory;
	
	@Transactional
	public List<TaiKhoan> LayDanhTaiKhoan() {
		Session session = sessionFactory.getCurrentSession();
		try {
			List<TaiKhoan> listTaiKhoan = (List<TaiKhoan>) session.createQuery("from TaiKhoan").getResultList();
			return listTaiKhoan;
		} catch (Exception e) {
			return null;
		}
		
	}
	@Transactional
	public TaiKhoan XoaTaiKhoan( String tentaikhoan) {
		Session session = sessionFactory.getCurrentSession();
		try {
			TaiKhoan xoataikhoan = session.get(TaiKhoan.class, tentaikhoan);
			session.delete(xoataikhoan);
			return xoataikhoan;
		} catch (Exception e) {
			return null;
		}
		
	}
	@Transactional
	public TaiKhoan LayTaiKhoan(String tentaikhoan) {
		Session session = sessionFactory.getCurrentSession();
		TaiKhoan TaiKhoan = (TaiKhoan) session.createQuery("from TaiKhoan where TenTaiKhoan='"+tentaikhoan+"'").getSingleResult();
		return TaiKhoan;
	}
	
	@Transactional
	public TaiKhoan SuaTaiKhoan(String tentaikhoan, String matkhau, String quyen) {
		Session session = sessionFactory.getCurrentSession();
	try {
		TaiKhoan taikhoan = (TaiKhoan) session.createQuery("from TaiKhoan where TenTaiKhoan='"+tentaikhoan+"'").getSingleResult();
		taikhoan.setMatkhau(matkhau);
		taikhoan.setQuyen(quyen);
		session.update(taikhoan);
		return taikhoan;
	} catch (Exception e) {
		return null;
	}
		
		
	}
	
	@Transactional
	public boolean ThemTaiKhoan(TaiKhoan taikhoan) {
		Session session = sessionFactory.getCurrentSession();
		try {	
			String tentaikhoan = (String) session.save(taikhoan);
			if(tentaikhoan !=null) {
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
	public TaiKhoan DoiMK(String tentaikhoan, String matkhau) {
		Session session = sessionFactory.getCurrentSession();
		try {
			TaiKhoan taikhoan = (TaiKhoan) session.createQuery("from TaiKhoan where TenTaiKhoan='"+tentaikhoan+"'").getSingleResult();
			taikhoan.setMatkhau(matkhau);
			session.update(taikhoan);
			return taikhoan;
		} catch (Exception e) {
			return null;
		}
	}

}
