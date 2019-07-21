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
@RequestMapping("/doimatkhau")
public class DoiMatKhauController {

	@Autowired
	TaiKhoanService taikhoanService;
	
	@GetMapping
	public String Default() {
		
		return"doimatkhau";
	}
	@PostMapping
	public String SuaTaiKhoan(HttpSession httpSession, @RequestParam String matkhau,
			@RequestParam String matkhauhientai,@RequestParam String nhaplaimatkhau, ModelMap modelMap) {
			
			String tentaikhoan = (String) httpSession.getAttribute("user");
			TaiKhoan tk = taikhoanService.LayTaiKhoan(tentaikhoan);
			System.out.println("matkhaucu:"+tk.getMatkhau());
			System.out.println("mat khau hien tai:"+matkhauhientai);
			if(matkhauhientai.equals(tk.getMatkhau())) {
					if(nhaplaimatkhau.equals(matkhau)) {
						
						try {
							TaiKhoan taikhoan = taikhoanService.DoiMK(tentaikhoan, matkhau);
							modelMap.addAttribute("thongbao1","Đổi mật khẩu thành công!");
							return "doimatkhau";
						} catch (Exception e) {
							modelMap.addAttribute("thongbao","Đổi mật khẩu thất bại!");
							return "doimatkhau";
						}
						
					}else {
						modelMap.addAttribute("thongbao","Nhập lại mật khẩu không khớp!");
						return "doimatkhau";
					}
				
			}else {
				
				modelMap.addAttribute("thongbao","Mật khẩu hiện tại không đúng!");
				return "doimatkhau";
			}
		}
	}
