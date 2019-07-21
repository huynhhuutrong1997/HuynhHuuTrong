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

import Entities.TaiKhoan;
import Services.TaiKhoanService;

@Controller
@RequestMapping("/taikhoan")
@SessionAttributes("showtk")
public class TaiKhoanController {
	
	@Autowired
	TaiKhoanService taikhoanService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
	
		try {
			List<TaiKhoan> listTaiKhoan = taikhoanService.LayDanhTaiKhoan();
			modelMap.addAttribute("listTaiKhoan",listTaiKhoan);
		} catch (Exception e) {
			System.out.println("TaiKhoanController:"+e.toString());
		}
		
		return "taikhoan";
		
	}
	@PostMapping
	public String XoaTaiKhoan(@RequestParam String tentaikhoan,ModelMap modelMap) {
		try {
			TaiKhoan xoaTaiKhoan = taikhoanService.XoaTaiKhoan(tentaikhoan);
			Default(modelMap);
			
		} catch (Exception e) {
			System.out.println("TaiKhoanController:"+e.toString());
		}
		
		return "taikhoan";	
		
	}
	@GetMapping("/{tentaikhoan}")
	public String ShowSuaTaiKhoan(@PathVariable String tentaikhoan,ModelMap modelMap) {
	
		try {
			modelMap.addAttribute("showtk",tentaikhoan);
		} catch (Exception e) {
			System.out.println("TaiKhoanController:"+e.toString());
		}
		
		
		return "redirect:/suatk";
		
	}

}
