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

import Entities.NgayNghi;
import Entities.NhanVien;
import Entities.PhongBan;
import Imp.NgayNghiImp;

@Repository
@Scope(proxyMode = ScopedProxyMode.TARGET_CLASS)
public class NgayNghiDAO implements NgayNghiImp {
	@Autowired
	SessionFactory sessionFactory;

	@Transactional
	public NgayNghi LayDanhSachNhanVien(Date ngaynghi) {
		Session session = sessionFactory.getCurrentSession();
		NgayNghi NgayNghi;
		String sql = "from NgayNghi where ngaynghi='" + ngaynghi + "'";
		try {
			NgayNghi = (NgayNghi) session.createQuery(sql).getSingleResult();
			return NgayNghi;
		} catch (Exception e) {
			return null;
		}
	}

	@Transactional
	public boolean ThemNgayNghi(NgayNghi ngaynghi) {
		Session session = sessionFactory.getCurrentSession();
		try {

			String s = (String) session.save(ngaynghi);
			if (s != null) {
				return true;
			} else {
				return false;
			}
		} catch (Exception e) {
			return false;
		}

	}

	public List<NgayNghi> LayNgayNghi(int thang) {
		
		Session session = sessionFactory.getCurrentSession();
		
		List<NgayNghi> ngaynghi = (List<NgayNghi>) session.createQuery("from NgayNghi where MONTH(ngaynghi)='"+thang+"'").getResultList();
		
		return ngaynghi;
	}

	@Transactional
	public boolean XoaNgayNghi(int mann) {
		Session session = sessionFactory.getCurrentSession();
		try {
			NgayNghi ngaynghi = session.get(NgayNghi.class, mann);
			session.delete(ngaynghi);
			return true;
		} catch (Exception e) {
			return false;
		}
	}


}
