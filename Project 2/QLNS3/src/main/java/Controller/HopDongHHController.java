package Controller;

import java.sql.Date;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.SessionAttributes;

import Entities.HopDongLaoDong;
import Services.HopDongLDService;

@Controller
@RequestMapping("/hopdonghh")
@SessionAttributes("hh")
public class HopDongHHController {
	
	@Autowired
	HopDongLDService hopdongldService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		long hh; 
		Date denngay;
		
		 // Định dạng thời gian
        SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");
        Calendar c1 = Calendar.getInstance();
        Calendar c2 = Calendar.getInstance();
		
		long millis=System.currentTimeMillis();  
		java.sql.Date date=new java.sql.Date(millis);
	try {
		List<HopDongLaoDong> listHopDong = hopdongldService.LayDanhSachHD();
		List<HopDongLaoDong> listhdhh = new ArrayList<HopDongLaoDong>();
		for(HopDongLaoDong hd:listHopDong)
		{
			denngay  = hd.getDenngay();
			c1.setTime(denngay);
	        c2.setTime(date);
	        hh= (c1.getTime().getTime() - c2.getTime().getTime())
	                / (24 * 3600 * 1000);
	        
	       if(hh<30)   {
	    	   listhdhh.add(hd);
	       }
		}
		
		modelMap.addAttribute("listhdhh",listhdhh);
	} catch (Exception e) {
		System.out.println("HopDongHH:"+e.toString());
	}	
		

		
       
		return "hopdonghh";
		
	}

}
