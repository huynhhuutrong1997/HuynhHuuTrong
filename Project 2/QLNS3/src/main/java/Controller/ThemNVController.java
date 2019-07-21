package Controller;

import java.sql.Date;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

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
@RequestMapping("/themnv")
public class ThemNVController {
	@Autowired
	BangLuongService bacluongService;
	@Autowired
	ChucVuService chucvuService;
	@Autowired
	PhongBanService phongbanService;
	@Autowired
	TrinhDoHocVanService trinhdohocvanService;
	@Autowired
	NhanVienService nhanvienService;
	
	@GetMapping
	public String Default(ModelMap modelMap) {
		long millis=System.currentTimeMillis();  
		java.sql.Date date=new java.sql.Date(millis);
		modelMap.addAttribute("ngayhientai",date);
	
		try {
			List<BangLuong> listBangLuong = bacluongService.LayDanhLuong();
			modelMap.addAttribute("listBangLuong",listBangLuong);
			List<ChucVu> listChucVu = chucvuService.LayDanhChucVu();
			modelMap.addAttribute("listChucVu",listChucVu);
			List<PhongBan> listPhongBan = phongbanService.LayDanhSachPhongBan();
			modelMap.addAttribute("listPhongBan",listPhongBan);
			List<TrinhDoHocVan> listTrinhDohv = trinhdohocvanService.LayDSTrinhDoHV();
			modelMap.addAttribute("listTrinhDohv",listTrinhDohv);
			
		} catch (Exception e) {
			// TODO: handle exception
		}
		
		
		return "themnv";
		
	}

	@PostMapping("/them")
	public String ThemTK(@RequestParam String manv,@RequestParam String hinhanh,@RequestParam String honv, 
			@RequestParam String tennv,@RequestParam String gioitinh,@RequestParam String dantoc, 
			@RequestParam Date ngaysinh,@RequestParam String quequan,@RequestParam String diachi,
			@RequestParam String sdt,@RequestParam String email,@RequestParam String phongban,@RequestParam String chucvu,
			@RequestParam String trinhdohv, @RequestParam String maluong,@RequestParam String cmnd, @RequestParam String diemmanh,
			@RequestParam String diemyeu,@RequestParam Date ngayvaoct, @RequestParam float bacluong, @RequestParam float bacphucap,
			ModelMap modelMap) {
		
		if(manv==""||honv==""||tennv==""||dantoc==""||sdt==""||quequan==""||diachi==""||email==""||cmnd==""||
				diemmanh==""||diemyeu==""||bacluong==0||bacphucap==0) {
			Default(modelMap);
			modelMap.addAttribute("thongbao", "Chưa điền đủ thông tin");
			return"themnv";
		}else {
	
	
			try {
				PhongBan phongbanadd = new PhongBan();
				phongbanadd.setMapb(phongban);
				ChucVu chucvuadd = new ChucVu();
				chucvuadd.setMacv(chucvu);
				BangLuong bangluongadd = new BangLuong();
				bangluongadd.setMaluong(maluong);
				TrinhDoHocVan trinhdohvadd = new TrinhDoHocVan();
				trinhdohvadd.setMatdhv(trinhdohv);
				NhanVien nhanvien = new NhanVien();
				nhanvien.setManv(manv);
				nhanvien.setAnh(hinhanh);
				nhanvien.setHonv(honv);
				nhanvien.setTennv(tennv);
				nhanvien.setGioitinh(gioitinh);
				nhanvien.setDantoc(dantoc);
				nhanvien.setNgaysinh(ngaysinh);
				nhanvien.setQuequan(quequan);
				nhanvien.setDiachithuongtru(diachi);
				nhanvien.setSdt(sdt);
				nhanvien.setEmail(email);
				nhanvien.setPhongban(phongbanadd);
				nhanvien.setChucvu(chucvuadd);
				nhanvien.setTrinhdohocvan(trinhdohvadd);
				nhanvien.setBangluong(bangluongadd);
				nhanvien.setCmnd(cmnd);
				nhanvien.setDiemmanh(diemmanh);
				nhanvien.setDiemyeu(diemyeu);
				nhanvien.setNgayvaocongty(ngayvaoct);
				nhanvien.setBacluong(bacluong);
				nhanvien.setBacphucap(bacphucap);
				boolean kiemtra = nhanvienService.ThemNhanVien(nhanvien);
				return "redirect:/nhanvien";
			} catch (Exception e) {
				modelMap.addAttribute("thongbao", "Mã nhân viên đẫ tồn tại");
				return "themnv";
			}	
		}
		
		
		
	}
	

}
