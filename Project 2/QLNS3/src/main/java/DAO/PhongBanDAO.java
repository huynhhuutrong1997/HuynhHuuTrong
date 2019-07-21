package DAO;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Scope;
import org.springframework.context.annotation.ScopedProxyMode;
import org.springframework.stereotype.Repository;
import org.springframework.transaction.annotation.Transactional;

import Entities.PhongBan;
import Imp.PhongBanImp;
@Repository
@Scope(proxyMode = ScopedProxyMode.TARGET_CLASS)
public class PhongBanDAO implements PhongBanImp{
	
	@Autowired
	SessionFactory sessionFactory;

	@Transactional
	public List<PhongBan> LayDanhSachPhongBan() {
		Session session = sessionFactory.getCurrentSession();
		try {
			List<PhongBan> listPhongBan = (List<PhongBan>) session.createQuery("from PhongBan").getResultList();
			return listPhongBan;
		} catch (Exception e) {
			return null;
		}
		
	}

	@Transactional
	public boolean ThemPB(PhongBan phongban) {
		Session session = sessionFactory.getCurrentSession();
		try {	
			String mapb = (String) session.save(phongban);
			if(mapb !=null) {
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
	public PhongBan SuaPB(String mapb, String tenpb, String sdtpb) {
		Session session = sessionFactory.getCurrentSession();
		try {
			PhongBan phongban = (PhongBan) session.createQuery("from PhongBan where mapb='"+mapb+"'").getSingleResult();
			phongban.setTenpb(tenpb);
			phongban.setSdtpb(sdtpb);
			session.update(phongban);
			return phongban;
		} catch (Exception e) {
			return null;
		}
	}

	@Transactional
	public PhongBan LayPB(String mapb) {
		Session session = sessionFactory.getCurrentSession();
		PhongBan phongban = (PhongBan) session.createQuery("from PhongBan where mapb='"+mapb+"'").getSingleResult();
		return phongban;
	}

	@Transactional
	public PhongBan XoaPB(String mapb) {
		Session session = sessionFactory.getCurrentSession();
		try {
			PhongBan xoapb = session.get(PhongBan.class, mapb);
			session.delete(xoapb);
			return xoapb;
		} catch (Exception e) {
			return null;
		}
	}

}
