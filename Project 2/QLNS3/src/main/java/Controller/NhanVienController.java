package Controller;

import java.util.List;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.SessionAttributes;

import Entities.NhanVien;
import Services.NhanVienService;

@Controller
@RequestMapping("/nhanvien")
@SessionAttributes("sessionnv")
public class NhanVienController {

	@Autowired
	NhanVienService nhanvienService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		try {
			List<NhanVien> listNhanVien = nhanvienService.LayDanhSachNhanVien();
			modelMap.addAttribute("listNhanVien",listNhanVien);
			
		} catch (Exception e) {
			System.out.println("NhanVienController:"+e.toString());
		}
		
		return "nhanvien";
		
	}
	@PostMapping
	public String XoaNhanVien(@RequestParam String manv,ModelMap modelMap) {
	
		try {
			NhanVien xoanhanvien = nhanvienService.XoaNhanVien(manv);
			Default(modelMap);
		} catch (Exception e) {
			System.out.println("NhanVienController:"+e.toString());
		}
		
		return "nhanvien";	
		
	}
	@GetMapping("/{manv}")
	public String ShowNhanVien(@PathVariable String manv, ModelMap modelMap) {
		try {
			modelMap.addAttribute("sessionnv",manv);
		} catch (Exception e) {
			System.out.println("NhanVienController:"+e.toString());
		}
		
		return "redirect:/chitietnv";
		
	}
}
