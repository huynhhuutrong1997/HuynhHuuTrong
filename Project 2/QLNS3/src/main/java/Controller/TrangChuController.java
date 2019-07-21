package Controller;




import javax.servlet.http.HttpSession;

import org.springframework.stereotype.Controller;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.SessionAttribute;
@Controller
@RequestMapping("/")
public class TrangChuController {
	
	@GetMapping
	@Transactional
	public String Default(ModelMap modelMap, HttpSession httpSession) {
		if(httpSession.getAttribute("user")!=null) {
			String taikhoan =(String) httpSession.getAttribute("user");
//			String chucaidau = taikhoan.substring(0, 1);
			modelMap.addAttribute("chucaidau",taikhoan);
		}
		return "trangchu" ;
	}
	@GetMapping("thoat")
	public String Thoat(HttpSession session) {
		   session.removeAttribute("user");
		   return "redirect:/";
	   }

}
