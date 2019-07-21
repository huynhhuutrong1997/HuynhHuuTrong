package Entities;






import java.sql.Date;
import java.util.Set;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.OneToOne;

@Entity(name="NhanVien")
public class NhanVien {
	@Id
	String manv;
	String anh;
	String honv;
	String tennv;
	Date ngaysinh;
	String quequan;
	String diachithuongtru;
	String gioitinh;
	String dantoc;
	String sdt;
	String email;
	float bacluong;
	float bacphucap;
	
	@OneToOne
	@JoinColumn(name="maphong")
	PhongBan phongban;
	
	@OneToOne
	@JoinColumn(name="macv")
	ChucVu chucvu;
	
	@OneToOne
	@JoinColumn(name="maluong")
	BangLuong bangluong;

	Date ngayvaocongty;
	String diemmanh;
	String diemyeu;
	
	@OneToOne
	@JoinColumn(name="matdhv")
	TrinhDoHocVan trinhdohocvan;

	String cmnd;
	
	@ManyToMany(fetch=FetchType.EAGER)
	@JoinTable(name="NgayNghiNhanVien",
	joinColumns= {@JoinColumn(name="manv",referencedColumnName="manv")},
	inverseJoinColumns= {@JoinColumn(name="mangaynghi",referencedColumnName="mangaynghi")})
	Set<NgayNghi> ngaynghi;
	
	
	
	public float getBacluong() {
		return bacluong;
	}
	public void setBacluong(float bacluong) {
		this.bacluong = bacluong;
	}
	public float getBacphucap() {
		return bacphucap;
	}
	public void setBacphucap(float bacphucap) {
		this.bacphucap = bacphucap;
	}
	public BangLuong getBangluong() {
		return bangluong;
	}
	public void setBangluong(BangLuong bangluong) {
		this.bangluong = bangluong;
	}
	public String getCmnd() {
		return cmnd;
	}
	public void setCmnd(String cmnd) {
		this.cmnd = cmnd;
	}
	public PhongBan getPhongban() {
		return phongban;
	}
	public void setPhongban(PhongBan phongban) {
		this.phongban = phongban;
	}
	public ChucVu getChucvu() {
		return chucvu;
	}
	public void setChucvu(ChucVu chucvu) {
		this.chucvu = chucvu;
	}
	
	public TrinhDoHocVan getTrinhdohocvan() {
		return trinhdohocvan;
	}
	public void setTrinhdohocvan(TrinhDoHocVan trinhdohocvan) {
		this.trinhdohocvan = trinhdohocvan;
	}
	public String getManv() {
		return manv;
	}
	public void setManv(String manv) {
		this.manv = manv;
	}
	public String getAnh() {
		return anh;
	}
	public void setAnh(String anh) {
		this.anh = anh;
	}
	public String getHonv() {
		return honv;
	}
	public void setHonv(String honv) {
		this.honv = honv;
	}
	public String getTennv() {
		return tennv;
	}
	public void setTennv(String tennv) {
		this.tennv = tennv;
	}
	public Date getNgaysinh() {
		return ngaysinh;
	}
	public void setNgaysinh(Date ngaysinh) {
		this.ngaysinh = ngaysinh;
	}
	public String getQuequan() {
		return quequan;
	}
	public void setQuequan(String quequan) {
		this.quequan = quequan;
	}
	public String getDiachithuongtru() {
		return diachithuongtru;
	}
	public void setDiachithuongtru(String diachithuongtru) {
		this.diachithuongtru = diachithuongtru;
	}
	public String getGioitinh() {
		return gioitinh;
	}
	public void setGioitinh(String gioitinh) {
		this.gioitinh = gioitinh;
	}
	public String getDantoc() {
		return dantoc;
	}
	public void setDantoc(String dantoc) {
		this.dantoc = dantoc;
	}
	public String getSdt() {
		return sdt;
	}
	public void setSdt(String sdt) {
		this.sdt = sdt;
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	
	public Date getNgayvaocongty() {
		return ngayvaocongty;
	}
	public void setNgayvaocongty(Date ngayvaocongty) {
		this.ngayvaocongty = ngayvaocongty;
	}
	public String getDiemmanh() {
		return diemmanh;
	}
	public void setDiemmanh(String diemmanh) {
		this.diemmanh = diemmanh;
	}
	public String getDiemyeu() {
		return diemyeu;
	}
	public void setDiemyeu(String diemyeu) {
		this.diemyeu = diemyeu;
	}
	public Set<NgayNghi> getNgaynghi() {
		return ngaynghi;
	}
	public void setNgaynghi(Set<NgayNghi> ngaynghi) {
		this.ngaynghi = ngaynghi;
	}
	
	
	

}
