package Controller;

import javax.servlet.http.HttpSession;

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
@RequestMapping("/suacv")
public class SuaCVController {
	
	@Autowired
	ChucVuService chucvuService;
	
	@GetMapping
	public String Default(HttpSession httpSession,String macv,ModelMap modelMap) {
	try {
		macv = (String) httpSession.getAttribute("showcv");
		ChucVu chucvu = chucvuService.LayCV(macv);
		modelMap.addAttribute("chucvu",chucvu);
	} catch (Exception e) {
		System.out.println("SuaCV"+e.toString());
	}	
		
		
		return "suacv" ;
	}

	@PostMapping
	public String SuaTaiKhoan(@RequestParam String macv, @RequestParam String tencv,@RequestParam String mota, ModelMap modelMap) {

		try {
			ChucVu chucvu = chucvuService.SuaCV(macv, tencv, mota);
		} catch (Exception e) {
			System.out.println("SuaCV"+e.toString());
		}
		
		
		return "redirect:/chucvu";	
		
	}

}
