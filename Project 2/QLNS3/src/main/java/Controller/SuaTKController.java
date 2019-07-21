package Controller;

import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.TaiKhoan;
import Services.TaiKhoanService;
@Controller
@RequestMapping("/suatk")
public class SuaTKController {
	@Autowired
	TaiKhoanService taikhoanService;
	
	@GetMapping
	public String Default(HttpSession httpSession,String tentaikhoan,ModelMap modelMap) {
	try {
		tentaikhoan = (String) httpSession.getAttribute("showtk");
		TaiKhoan taikhoan = taikhoanService.LayTaiKhoan(tentaikhoan);
		modelMap.addAttribute("taikhoan",taikhoan);
	} catch (Exception e) {
		System.out.println("SuaTK:"+e.toString());
	}	
		
		
		return "suatk" ;
	}

	@PostMapping
	public String SuaTaiKhoan(@RequestParam String tentaikhoan, @RequestParam String matkhau, @RequestParam String quyen, ModelMap modelMap) {
		try {
			TaiKhoan taikhoan = taikhoanService.SuaTaiKhoan(tentaikhoan, matkhau, quyen);
		} catch (Exception e) {
			System.out.println("SuaTK:"+e.toString());
		}
		
		return "redirect:/taikhoan";	
		
	}
}
