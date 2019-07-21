package Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.ChucVu;
import Services.ChucVuService;

@Controller
@RequestMapping("/themcv")
public class ThemCVController {
	
	@Autowired
	ChucVuService chucvuService; 
	
	@GetMapping
	public String Default() {
		
		return "themcv";
	}
	
	@PostMapping
	public String ThemCV(@RequestParam String macv, @RequestParam String tencv ,@RequestParam String mota, ModelMap modelMap) {
		if(macv==""||tencv==""||mota=="") {
			modelMap.addAttribute("thongbao","Chưa điền đủ thông tin!");
			return"themcv";
		}else {
			try {
				ChucVu chucvu = new ChucVu();
				chucvu.setMacv(macv);
				chucvu.setTencv(tencv);
				chucvu.setMotacongviec(mota);
				chucvuService.ThemCV(chucvu);
				return "redirect:/chucvu";
			} catch (Exception e) {
				modelMap.addAttribute("thongbao","Mã chức vụ đã tồn tại!");
				return "themcv";
				
			}
		}
		
		
	}

}
