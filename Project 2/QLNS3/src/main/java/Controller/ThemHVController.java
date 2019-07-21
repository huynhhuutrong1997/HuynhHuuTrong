package Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.TrinhDoHocVan;
import Services.TrinhDoHocVanService;

@Controller
@RequestMapping("/themhv")
public class ThemHVController {
	@Autowired
	TrinhDoHocVanService trinhdohocvanService;
	
	@GetMapping
	public String Default() {
		
		
		return "themhv";
	}
	@PostMapping
	public String ThemHV(@RequestParam String mahv, @RequestParam String tenhv ,@RequestParam String chuyennganh, ModelMap modelMap) {
	
		if(mahv==""||tenhv==""||chuyennganh=="") {
			modelMap.addAttribute("thongbao","Chưa điền đủ thông tin!");
			return"themhv";
		}else {
			
				try {
					TrinhDoHocVan hocvan = new TrinhDoHocVan();
					hocvan.setMatdhv(mahv);
					hocvan.setTentdhv(tenhv);
					hocvan.setChuyennganh(chuyennganh);
					trinhdohocvanService.ThemHV(hocvan);
					return "redirect:/trinhdohv";
				} catch (Exception e) {
					modelMap.addAttribute("thongbao", "Mã học vấn đã tồn tại !");
					return "themhv";
				}
		}
		
		
		
		
	}

}
