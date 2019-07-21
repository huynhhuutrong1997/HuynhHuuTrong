package DAO;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Scope;
import org.springframework.context.annotation.ScopedProxyMode;
import org.springframework.stereotype.Repository;
import org.springframework.transaction.annotation.Transactional;

import Entities.ChucVu;
import Entities.PhongBan;
import Imp.ChucVuImp;

@Repository
@Scope(proxyMode = ScopedProxyMode.TARGET_CLASS)
public class ChucVuDAO implements ChucVuImp{

	@Autowired
	SessionFactory sessionFactory;
	
	@Transactional
	public List<ChucVu> LayDanhChucVu() {
		Session session = sessionFactory.getCurrentSession();
	try {
		List<ChucVu> listChucVu = (List<ChucVu>) session.createQuery("from ChucVu").getResultList();
		return listChucVu;
	} catch (Exception e) {
		return null;
	}
		
	}

	@Transactional
	public boolean ThemCV(ChucVu chucvu) {
		Session session = sessionFactory.getCurrentSession();
		try {	
			String macv = (String) session.save(chucvu);
			if(macv !=null) {
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
	public ChucVu LayCV(String macv) {
		Session session = sessionFactory.getCurrentSession();
		try {
			
			ChucVu chucvu = (ChucVu) session.createQuery("from ChucVu where macv='"+macv+"'").getSingleResult();
			return chucvu;
		} catch (Exception e) {
			return null;
		}
		
		
	}

	@Transactional
	public ChucVu SuaCV(String macv, String tencv, String mota) {
		Session session = sessionFactory.getCurrentSession();
		try {
			ChucVu chucvu = (ChucVu) session.createQuery("from ChucVu where macv='"+macv+"'").getSingleResult();
			chucvu.setTencv(tencv);
			chucvu.setMotacongviec(mota);
			session.update(chucvu);
			return chucvu;
		} catch (Exception e) {
			return null;
		}
	}

	@Transactional
	public ChucVu XoaCV(String macv) {
		Session session = sessionFactory.getCurrentSession();
		try {
			ChucVu xoacv = session.get(ChucVu.class, macv);
			session.delete(xoacv);
			return xoacv;
		} catch (Exception e) {
			return null;
		}
	}

}
