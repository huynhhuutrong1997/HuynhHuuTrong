package Controller;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.SessionAttributes;

import Entities.TaiKhoan;
import Services.DangNhapService;


@Controller
@RequestMapping("/dangnhap")
@SessionAttributes("user")
public class DangNhapController {
	
	@GetMapping
	public String Default() {
		return "dangnhap" ;
	}
	
	
	@Autowired
	DangNhapService dangnhapService;
	
	@PostMapping
	@Transactional
	public String DangNhap(@RequestParam String tentaikhoan,@RequestParam String matkhau, ModelMap modelMap, HttpServletRequest req) {
		
	try {
		HttpSession session = req.getSession();
		TaiKhoan tk = dangnhapService.LayTaiKhoan(tentaikhoan, matkhau);
		boolean kiemtra =dangnhapService.DangNhap(tentaikhoan,matkhau);
		if (kiemtra) {
			session.setAttribute("quyen",tk.getQuyen());
			modelMap.addAttribute("user",tentaikhoan);
			return "redirect:/";
		}else {
			modelMap.addAttribute("kiemtra","Đăng Nhập Thất Bại!");
			return "dangnhap";		
		}
	} catch (Exception e) {
			modelMap.addAttribute("kiemtra","Đăng Nhập Thất Bại!");
			return "dangnhap";		
	}
		
		
	}
	
  
}