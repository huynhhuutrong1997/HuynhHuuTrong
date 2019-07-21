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

import Entities.HopDongLaoDong;
import Entities.PhongBan;
import Services.HopDongLDService;

@Controller
@RequestMapping("/hopdongld")
@SessionAttributes("showhd")
public class HopDongLDController {
	
	@Autowired
	HopDongLDService hopdongldService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		try {
			List<HopDongLaoDong> listHopDong = hopdongldService.LayDanhSachHD();
			modelMap.addAttribute("listHopDong",listHopDong);
		} catch (Exception e) {
			System.out.println("HopDongLD:"+e.toString());
		}
		
		
		return "hopdongld";
		
	}

	@GetMapping("/{mahd}")
	public String ShowSuaHD(@PathVariable String mahd,ModelMap modelMap) {
		try {
			modelMap.addAttribute("showhd",mahd);
		} catch (Exception e) {
			// TODO: handle exception
		}
		
		
		return "redirect:/suahd";
		
	}
	
	@PostMapping
	public String XoaHD(@RequestParam String mahd,ModelMap modelMap) {
		try {
			HopDongLaoDong xoahd = hopdongldService.XoaHD(mahd);
			Default(modelMap);
		} catch (Exception e) {
			// TODO: handle exception
		}
		
		return "hopdongld";	
		
	}
}
