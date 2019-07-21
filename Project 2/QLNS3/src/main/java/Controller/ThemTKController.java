package Controller;

import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.NhanVien;
import Entities.TaiKhoan;
import Services.NhanVienService;
import Services.TaiKhoanService;

@Controller
@RequestMapping("/themtk")
public class ThemTKController {
	
	@Autowired
	TaiKhoanService taikhoanService;
	@Autowired
	NhanVienService nhanvienService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
	
		try {
			List<NhanVien> listNhanVien = nhanvienService.LayDanhSachNhanVien();
			modelMap.addAttribute("listNhanVien",listNhanVien);
		} catch (Exception e) {
			// TODO: handle exception
		}
		
	
		return "themtk" ;
	}
	
	@PostMapping
	public String ThemTK(@RequestParam String matkhau,@RequestParam String manv,String quyen, ModelMap modelMap) {
		if(manv==""||matkhau==""||quyen=="") {
			Default(modelMap);
			modelMap.addAttribute("thongbao","Chưa điền đủ thông tin!");
			return"themtk";
		}else {
			try {
				NhanVien nhanvien = new NhanVien();
				nhanvien.setManv(manv);
				TaiKhoan taikhoan =new TaiKhoan();
				taikhoan.setTentaikhoan(manv);
				taikhoan.setMatkhau(matkhau);
				taikhoan.setNhanvien(nhanvien);
				taikhoan.setQuyen(quyen);
				boolean kiemtra = taikhoanService.ThemTaiKhoan(taikhoan);
				return "redirect:/taikhoan";
			} catch (Exception e) {
				modelMap.addAttribute("thongbao","Nhân viên đã có tài khoản!");
				Default(modelMap);
				return"themtk";
			}
		}
		
		
	}
	

}
