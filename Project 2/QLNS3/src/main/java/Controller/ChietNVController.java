package Controller;

import java.sql.Date;
import java.util.List;

import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.SessionAttribute;
import org.springframework.web.bind.annotation.SessionAttributes;

import Entities.BangLuong;
import Entities.ChucVu;
import Entities.NhanVien;
import Entities.PhongBan;
import Entities.TrinhDoHocVan;
import Services.BangLuongService;
import Services.ChucVuService;
import Services.NhanVienService;
import Services.PhongBanService;
import Services.TrinhDoHocVanService;

@Controller
@RequestMapping("/chitietnv")
@SessionAttributes("suanv")
public class ChietNVController {
	@Autowired
	NhanVienService nhanvienService;
	@Autowired
	BangLuongService bangluongService;
	@Autowired
	ChucVuService chucvuService;
	@Autowired
	PhongBanService phongbanService;
	@Autowired
	TrinhDoHocVanService trinhdohocvanService;
	
	
	@GetMapping
	public String Default(HttpSession httpsession,@SessionAttribute("sessionnv") String manv, ModelMap modelMap) {
		System.out.println(httpsession.getAttribute("quyen"));
		try {
			modelMap.addAttribute("suanv",2);
			NhanVien nhanvien = (NhanVien) nhanvienService.LayNhanVien(manv);
			modelMap.addAttribute("nhanvien",nhanvien);
			httpsession.removeAttribute("anh");
			
			
			
		} catch (Exception e) {
			System.out.println("chitietnv:"+e.toString());
			
		}
		return "chitietnv";
		
	}
	@PostMapping
	public String SuaTK(HttpSession httpsession,ModelMap modelMap,@SessionAttribute("sessionnv") String manv) {
		try {
			List<BangLuong> listBangLuong = bangluongService.LayDanhLuong();
			modelMap.addAttribute("listBangLuong",listBangLuong);
			List<ChucVu> listChucVu = chucvuService.LayDanhChucVu();
			modelMap.addAttribute("listChucVu",listChucVu);
			List<PhongBan> listPhongBan = phongbanService.LayDanhSachPhongBan();
			modelMap.addAttribute("listPhongBan",listPhongBan);
			List<TrinhDoHocVan> listTrinhDohv = trinhdohocvanService.LayDSTrinhDoHV();
			modelMap.addAttribute("listTrinhDohv",listTrinhDohv);
			NhanVien nhanvien = (NhanVien) nhanvienService.LayNhanVien(manv);
			modelMap.addAttribute("nhanvien",nhanvien);
			modelMap.addAttribute("suanv",1);
			
			
		} catch (Exception e) {
			
			System.out.println("chitietnv:"+e.toString());
		}
		return "chitietnv";
		
	}
	@GetMapping("/{huy}")
	public String Huy(@PathVariable String huy,HttpSession httpsession, @SessionAttribute("sessionnv") String manv, ModelMap modelMap) {
	try {
		modelMap.addAttribute("suanv",2);
		NhanVien nhanvien = (NhanVien) nhanvienService.LayNhanVien(manv);
		modelMap.addAttribute("nhanvien",nhanvien);
		httpsession.removeAttribute("anh");
		
	} catch (Exception e) {
		System.out.println("chitietnv:"+e.toString());
	}	
		return "chitietnv";
		
	}
	
	@PostMapping("/sua")
	public String ThemTK(@RequestParam String manv,@RequestParam String hinhanh,@RequestParam String honv, 
			@RequestParam String tennv,@RequestParam String gioitinh,@RequestParam String dantoc, 
			@RequestParam Date ngaysinh,@RequestParam String quequan,@RequestParam String diachi,
			@RequestParam String sdt,@RequestParam String email,@RequestParam String phongban,@RequestParam String chucvu,
			@RequestParam String trinhdohv, @RequestParam String maluong,@RequestParam String cmnd, @RequestParam String diemmanh,
			@RequestParam String diemyeu,@RequestParam Date ngayvaoct,@RequestParam float bacluong, @RequestParam float bacphucap,
			ModelMap modelMap, HttpSession httpsession) {
		try {
			NhanVien nhanvien = nhanvienService.SuaNhanVien(manv, hinhanh, honv, tennv, gioitinh, dantoc, ngaysinh, quequan,
					diachi, sdt, email, phongban, chucvu, trinhdohv, maluong, cmnd, diemmanh, diemyeu, ngayvaoct, bacluong, bacphucap);
			modelMap.addAttribute("suanv",2);
			NhanVien nhanvien2 = (NhanVien) nhanvienService.LayNhanVien(manv);
			modelMap.addAttribute("nhanvien",nhanvien2);
			httpsession.removeAttribute("anh");
			
		} catch (Exception e) {
			System.out.println("chitietnv:"+e.toString());
		}	
			
			return "chitietnv";
	}


}
