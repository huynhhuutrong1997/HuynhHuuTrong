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

import Entities.PhongBan;
import Entities.TaiKhoan;
import Services.PhongBanService;

@Controller
@RequestMapping("/phongban")
@SessionAttributes("showpb")
public class PhongBanController {
	
	@Autowired
	PhongBanService phongbanService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		try {
			List<PhongBan> listPhongBan = phongbanService.LayDanhSachPhongBan();
			modelMap.addAttribute("listPhongBan",listPhongBan);
		} catch (Exception e) {
			System.out.println("PhongbanController:"+e.toString());
		}
		
		return "phongban";
		
	}
	
	@GetMapping("/{mapb}")
	public String ShowSuaPB(@PathVariable String mapb,ModelMap modelMap) {
		try {
			modelMap.addAttribute("showpb",mapb);
		} catch (Exception e) {
			System.out.println("PhongbanController:"+e.toString());
		}
		
		return "redirect:/suapb";
		
	}
	
	@PostMapping
	public String XoaPB(@RequestParam String mapb,ModelMap modelMap) {
	
		try {
			PhongBan xoapb = phongbanService.XoaPB(mapb);
			Default(modelMap);
		
		} catch (Exception e) {
			System.out.println("PhongbanController:"+e.toString());
		}
		return "phongban";	
	}

}
