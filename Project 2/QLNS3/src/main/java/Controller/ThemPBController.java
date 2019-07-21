package Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.PhongBan;
import Services.PhongBanService;

@Controller
@RequestMapping("/thempb")
public class ThemPBController {
	
	@Autowired
	PhongBanService phongbanService;
	

	@GetMapping
	public String Default() {
		
		
		return "thempb";
	}
	@PostMapping
	public String ThemPB(@RequestParam String mapb, @RequestParam String tenpb ,@RequestParam String sdtpb, ModelMap modelMap) {
	
		if(mapb==""||tenpb==""||sdtpb==""){
			modelMap.addAttribute("thongbao","Chưa điền đủ thông tin!");
			return"thempb";
		}
		try {
			PhongBan phongban = new PhongBan();
			phongban.setMapb(mapb);
			phongban.setTenpb(tenpb);
			phongban.setSdtpb(sdtpb);
			phongbanService.ThemPB(phongban);
			return "redirect:/phongban";
		} catch (Exception e) {
			modelMap.addAttribute("thongbao","Mã phòng ban đã tồn tại!");
			return "thempb";
		}
		
		
		
	
		
	}

}
