package DAO;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Scope;
import org.springframework.context.annotation.ScopedProxyMode;
import org.springframework.stereotype.Repository;
import org.springframework.transaction.annotation.Transactional;

import Entities.TaiKhoan;
import Imp.DangNhapImp;


@Repository
@Scope(proxyMode = ScopedProxyMode.TARGET_CLASS)
public class DangNhapDAO implements DangNhapImp {
	
	@Autowired
	SessionFactory sessionFactory;
	
	@Transactional
	public boolean DangNhap(String tentaikhoan, String matkhau) {
		Session session = sessionFactory.getCurrentSession();
		try {
			TaiKhoan taikhoan  =(TaiKhoan) session.createQuery("from TaiKhoan where TenTaiKhoan='"+tentaikhoan+"' and MatKhau='"+matkhau+"'").getSingleResult();
			if(taikhoan != null) {
				return true;
			}else {
				return false;
			}
		} catch (Exception e) {
				return false;
		}
		
	}

	@Transactional
	public TaiKhoan LayTaiKhoan(String tentaikhoan, String matkhau) {
		try {
			Session session = sessionFactory.getCurrentSession();
			TaiKhoan taikhoan  =(TaiKhoan) session.createQuery("from TaiKhoan where TenTaiKhoan='"+tentaikhoan+"' and MatKhau='"+matkhau+"'").getSingleResult();
			return taikhoan;
		} catch (Exception e) {
			return null;
		}
		
	}
	
	
	

}
