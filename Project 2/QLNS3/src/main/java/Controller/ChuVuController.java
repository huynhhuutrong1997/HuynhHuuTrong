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

import Entities.ChucVu;
import Entities.PhongBan;
import Services.ChucVuService;

@Controller
@RequestMapping("/chucvu")
@SessionAttributes("showcv")
public class ChuVuController {
	
	@Autowired
	ChucVuService chucvuService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
	try {
		List<ChucVu> listChucVu = chucvuService.LayDanhChucVu();
		modelMap.addAttribute("listChucVu",listChucVu);
		
	} catch (Exception e) {
		// TODO: handle exception
	}
		
		return "chucvu";
		
	}
	@GetMapping("/{macv}")
	public String ShowSuaCV(@PathVariable String macv,ModelMap modelMap) {
		try {
			modelMap.addAttribute("showcv",macv);
		} catch (Exception e) {
			// TODO: handle exception
		}
		
		
		return "redirect:/suacv";
		
	}
	
	@PostMapping
	public String XoaCV(@RequestParam String macv,ModelMap modelMap) {
		try {
			ChucVu xoacv = chucvuService.XoaCV(macv);
			Default(modelMap);
		} catch (Exception e) {
			// TODO: handle exception
		}
		
		return "chucvu";	
	}

}
