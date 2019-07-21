package Controller;

import java.sql.Date;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import Entities.NgayNghi;
import Entities.NhanVien;
import Services.NgayNghiService;

@Controller
@RequestMapping("/themngaynghi")
public class ThemNgayNghiController {
	@Autowired
	NgayNghiService ngaynghiService;

	@GetMapping
	public String Default(ModelMap modelMap, @RequestParam List<String> listnvnghi) {
		Date today = new Date(System.currentTimeMillis());
		modelMap.addAttribute("ngaynghi", today);
		NgayNghi nn = new NgayNghi();
		nn.setNgaynghi(today);
		
		try {
			//kiem tra ngay nghi da duoc luu chua
			NgayNghi ngaynghi = ngaynghiService.LayDanhSachNhanVien(today);
			//neu luu roi thi xoa no di
			if(ngaynghi!=null) {
				ngaynghiService.XoaNgayNghi(ngaynghi.getMangaynghi());
			}
			
			Set<NhanVien> nhanviens = new HashSet<NhanVien>();
			for (String s : listnvnghi) {
				NhanVien nv = new NhanVien();
				nv.setManv(s);
				nhanviens.add(nv);
			}
			for (NhanVien nv : nhanviens) {
				System.out.println("toi la nhan vien " + nv);
			}
			nn.setNhanVien(nhanviens);
			boolean boo = ngaynghiService.ThemNgayNghi(nn);
			modelMap.addAttribute("mess", "Thêm thành công");
			return "ngaynghi";

		} catch (Exception ex) {
			System.out.println(ex);
			return "ngaynghi";
		}

	}
}
