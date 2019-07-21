package Controller;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.ServletRequestUtils;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.AbstractController;

import Entities.NhanVien;
import Services.NgayNghiService;
import Services.NhanVienService;

public class RevenueReportController extends AbstractController{
	
	@Autowired
	NhanVienService nhanvienService;
	@Autowired
	NgayNghiService ngaynghiService;


	@Override
	protected ModelAndView handleRequestInternal(HttpServletRequest request, HttpServletResponse response)
			throws Exception {
		String output = ServletRequestUtils.getStringParameter(request, "output");
		
		List<NhanVien> listNhanVien = nhanvienService.LayDanhSachNhanVien();
		
		Map<String,NhanVien> revenueData = new HashMap<String,NhanVien>();
		for(NhanVien nv:listNhanVien) {
			revenueData.put(nv.getManv(), nv);
		}
//	
//		revenueData.put("1/21/2010", "$200,000");
//		revenueData.put("1/22/2012", "$300,000");
//		revenueData.put("1/23/2010", "$400,000");
//		revenueData.put("1/24/2010", "$500,000");
//		
		
		if(output ==null || "".equals(output)){
			//return normal view
			return new ModelAndView("bangluong","revenueData",revenueData);
			
		}else if("EXCEL".equals(output.toUpperCase())){
			//return excel view
			return new ModelAndView("ExcelRevenueSummary","revenueData",revenueData);
			
		}else{
			//return normal view
			return new ModelAndView("bangluong","revenueData",revenueData);
			
		}
	}
	

}
