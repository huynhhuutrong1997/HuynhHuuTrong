package Controller;

import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.SessionAttribute;

import Entities.NhanVien;
import Services.NhanVienService;

@Controller
@RequestMapping("/anh")
public class CapNhatAnhController {

	@Autowired
	NhanVienService nhanvienService;
	
	@GetMapping
	public String Anh(HttpSession session, @SessionAttribute("sessionnv") String manv, ModelMap modelMap) {
		modelMap.addAttribute("suanv",1);
		NhanVien nhanvien = (NhanVien) nhanvienService.LayNhanVien(manv);
		modelMap.addAttribute("nhanvien",nhanvien);
		return "chitietnv";
		
	}

}
