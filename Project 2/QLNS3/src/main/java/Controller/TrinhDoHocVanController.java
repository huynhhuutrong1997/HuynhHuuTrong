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
import Entities.TrinhDoHocVan;
import Services.TrinhDoHocVanService;

@Controller
@RequestMapping("/trinhdohv")
@SessionAttributes("showhv")
public class TrinhDoHocVanController {
	
	@Autowired
	TrinhDoHocVanService trinhdohocvanService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		
		try {
			List<TrinhDoHocVan> listTrinhDohv = trinhdohocvanService.LayDSTrinhDoHV();
			modelMap.addAttribute("listTrinhDohv",listTrinhDohv);
			
		} catch (Exception e) {
			// TODO: handle exception
		}
		return "trinhdohv";
		
	}
	@GetMapping("/{mahv}")
	public String ShowSuaHV(@PathVariable String mahv,ModelMap modelMap) {
		try {
			modelMap.addAttribute("showhv",mahv);
		} catch (Exception e) {
			System.out.println("HocVanController:"+e.toString());
		}
		
		return "redirect:/suahv";
		
	}
	
	@PostMapping
	public String XoaHV(@RequestParam String mahv,ModelMap modelMap) {
	
		try {
			TrinhDoHocVan xoahv = trinhdohocvanService.XoaHV(mahv);
			Default(modelMap);
		
		} catch (Exception e) {
			System.out.println("tringhodohocvanController:"+e.toString());
		}
		return "trinhdohv";	
	}
}
