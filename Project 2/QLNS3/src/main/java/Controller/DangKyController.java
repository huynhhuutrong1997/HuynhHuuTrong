package Controller;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.TaiKhoan;
import Services.DangKyService;

@Controller
@RequestMapping("/dangky")
public class DangKyController {
	
	@GetMapping
	public String Default() {
		return "dangky" ;
	}
	
	@Autowired
	DangKyService dangkyService;
	
	@PostMapping
	public String DangKy(@RequestParam String tentaikhoan,@RequestParam String matkhau,
			 @RequestParam String nhaplaimatkhau, ModelMap modelMap) {
		boolean checktk = validate(tentaikhoan);
		if(checktk) {
			if(matkhau.equals(nhaplaimatkhau)) {
				TaiKhoan taikhoan =new TaiKhoan();
				taikhoan.setTentaikhoan(tentaikhoan);
				taikhoan.setMatkhau(matkhau);
				boolean kiemtra = true;
				try {
					kiemtra = dangkyService.DangKy(taikhoan);
				} catch (Exception e) {
					kiemtra = false;
				}
				
				if(kiemtra) {
					modelMap.addAttribute("dkthanhcong","Đăng ký thành công");
				}else {
					modelMap.addAttribute("kiemtra","Tên tài khoản đã được dùng");
				}
			}else {
				modelMap.addAttribute("kiemtra","Mật khẩu không trùng khớp!");
			}
		}else {
			modelMap.addAttribute("kiemtra","Tên tài khoản không hợp lệ!");
		}
		return "dangky";
		
	}
	
	public static final Pattern VALID_EMAIL_ADDRESS_REGEX =
			Pattern.compile("^[A-Z0-9]{3,15}$",Pattern.CASE_INSENSITIVE);
	
	public static boolean validate(String emailStr) {
		Matcher matcher = VALID_EMAIL_ADDRESS_REGEX.matcher(emailStr);
		return matcher.find();
	}
	
}
