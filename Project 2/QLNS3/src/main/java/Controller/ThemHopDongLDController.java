package Controller;

import java.sql.Date;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.HopDongLaoDong;
import Entities.NhanVien;
import Services.HopDongLDService;
import Services.NhanVienService;

@Controller
@RequestMapping("/themhd")
public class ThemHopDongLDController {
	
	@Autowired
	HopDongLDService hopdongldService;
	
	@Autowired
	NhanVienService nhanvienService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		long millis=System.currentTimeMillis();  
		java.sql.Date date=new java.sql.Date(millis);
		modelMap.addAttribute("ngayhientai",date);
	try {
		List<NhanVien> listNhanVien = nhanvienService.LayDanhSachNhanVien();
		modelMap.addAttribute("listNhanVien",listNhanVien);
	} catch (Exception e) {
		System.out.println("ThemHopDongLD:"+e.toString());
	}	
		
		
		return "themhd";
	}

	@PostMapping
	public String ThemHD(@RequestParam String mahd, @RequestParam String nhanvien ,@RequestParam String loaihd,
			@RequestParam int thoigian,@RequestParam Date tungay, @RequestParam Date denngay, ModelMap modelMap) {
		if(mahd==""||nhanvien==""||loaihd=="") {
			Default(modelMap);
			modelMap.addAttribute("thongbao","Chưa điền đủ thông tin!");
			return"themhd";
		}else {
			try {
				HopDongLaoDong hopdong = new HopDongLaoDong();
				hopdong.setMahopdong(mahd);
				NhanVien nhanvien1 = new NhanVien();
				nhanvien1.setManv(nhanvien);
				hopdong.setNhanvien(nhanvien1);
				hopdong.setLoaihopdong(loaihd);
				hopdong.setThoigian(thoigian);
				hopdong.setTungay(tungay);
				hopdong.setDenngay(denngay);
				hopdongldService.ThemHD(hopdong);
				return "redirect:/hopdongld";
			} catch (Exception e) {
				modelMap.addAttribute("thong","Mã hợp đồng đã tồn tại");
				return "themhd";
			}	
	}
		
		
		

		
	}
}
