package Controller;

import java.sql.Date;
import java.text.SimpleDateFormat;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import DAO.NgayNghiDAO;
import Entities.NgayNghi;
import Entities.NhanVien;
import Services.NhanVienService;

@Controller
@RequestMapping("/xemngaynghi")
public class XemNgayNghiController {
	@Autowired
	NgayNghiDAO ngaynghiDAO;
	@Autowired
	NhanVienService nhanvienService;

	@GetMapping
	public String Default(ModelMap modelMap) {
		return null;
	}

	@PostMapping
	public String xemNgayNghi(@RequestParam Date ngaynghi, ModelMap modelMap) {
		// lay ngay gio he thong
		Date today = new Date(System.currentTimeMillis());
		SimpleDateFormat timeFormat = new SimpleDateFormat("MM/dd/yyyy");
		String s = timeFormat.format(today.getTime());
		String s2 = timeFormat.format(ngaynghi.getTime());

		// neu chon ngay hien tai thi chuyen ve page ngaynghi
		modelMap.addAttribute("ngaynghi", ngaynghi);
		if (s.equals(s2)) {
			List<NhanVien> listNhanVien = nhanvienService.LayDanhSachNhanVien();
			modelMap.addAttribute("listNhanVien", listNhanVien);
			return "ngaynghi";
		} else {
			NgayNghi listNgayNghi = ngaynghiDAO.LayDanhSachNhanVien(ngaynghi);
			modelMap.addAttribute("listNgayNghi", listNgayNghi);
			return "xemngaynghi";
		}

	}

}
