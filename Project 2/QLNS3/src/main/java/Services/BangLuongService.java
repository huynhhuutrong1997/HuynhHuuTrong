package Services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import DAO.BangLuongDAO;
import Entities.BangLuong;
import Imp.BangLuongImp;

@Service
public class BangLuongService implements BangLuongImp {
	
	@Autowired
	BangLuongDAO bangluongDAO;

	public List<BangLuong> LayDanhLuong() {
		
		return bangluongDAO.LayDanhLuong();
	}
	

}
