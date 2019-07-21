package Controller;

import javax.servlet.http.HttpSession;

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
@RequestMapping("/suapb")
public class SuaPBController {
	
	@Autowired
	PhongBanService phongbanService;
	
	@GetMapping
	public String Default(HttpSession httpSession,String mapb,ModelMap modelMap) {
	
		try {
			mapb = (String) httpSession.getAttribute("showpb");
			PhongBan phongban = phongbanService.LayPB(mapb);
			modelMap.addAttribute("phongban",phongban);
		} catch (Exception e) {
			System.out.println("SuaPBController:"+e.toString());
		}
		
		
		return "suapb" ;
	}

	@PostMapping
	public String SuaPB(@RequestParam String mapb, @RequestParam String tenpb,@RequestParam String sdtpb, ModelMap modelMap) {

		try {
			PhongBan phongban = phongbanService.SuaPB(mapb, tenpb,sdtpb);
			
		} catch (Exception e) {
			System.out.println("SuaPBController:"+e.toString());
		}
		
		
		return "redirect:/phongban";	
		
	}
	

	
}
