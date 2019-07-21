package Controller;

import java.io.File;
import java.io.IOException;
import java.util.Iterator;

import javax.servlet.ServletContext;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.SessionAttributes;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.multipart.MultipartHttpServletRequest;

@Controller
@RequestMapping("api/")
public class AjaxApiController {
	
	@Autowired
	ServletContext context;
	
	@PostMapping("uploadfile")
	public String Uploadfile(MultipartHttpServletRequest request, ModelMap modelMap) {
		String path_save_file = context.getRealPath("/resources/images/nhanvien/");
		Iterator<String> listName =request.getFileNames();
		MultipartFile mpf = request.getFile(listName.next());
		File file_save = new File(path_save_file + mpf.getOriginalFilename());
		String anh =mpf.getOriginalFilename();
		try {
			mpf.transferTo(file_save );
			return "chitietnv";
		} catch (IllegalStateException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		return "chitietnv";
		
		
	}

}
