package Controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import Entities.BangLuong;
import Services.BangLuongService;

@Controller
@RequestMapping("/luong")
public class LuongController {
	
	@Autowired
	BangLuongService bangluongService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		try {
			List<BangLuong> listBangLuong = bangluongService.LayDanhLuong();
			modelMap.addAttribute("listBangLuong",listBangLuong);
		} catch (Exception e) {
			System.out.println("Luong controlerr:"+e.toString());
		}
	
		return "luong";
		
	}

}
