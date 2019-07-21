package Entities;

import java.sql.Date;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;

@Entity(name="HopDongLaoDong")
public class HopDongLaoDong {
	
	@Id
	String mahopdong;
	
	@OneToOne
	@JoinColumn(name="manv")
	NhanVien nhanvien;
	
	public String getMahopdong() {
		return mahopdong;
	}
	public void setMahopdong(String mahopdong) {
		this.mahopdong = mahopdong;
	}
	public NhanVien getNhanvien() {
		return nhanvien;
	}
	public void setNhanvien(NhanVien nhanvien) {
		this.nhanvien = nhanvien;
	}
	public String getLoaihopdong() {
		return loaihopdong;
	}
	public void setLoaihopdong(String loaihopdong) {
		this.loaihopdong = loaihopdong;
	}
	public int getThoigian() {
		return thoigian;
	}
	public void setThoigian(int thoigian) {
		this.thoigian = thoigian;
	}
	public Date getTungay() {
		return tungay;
	}
	public void setTungay(Date tungay) {
		this.tungay = tungay;
	}
	public Date getDenngay() {
		return denngay;
	}
	public void setDenngay(Date denngay) {
		this.denngay = denngay;
	}
	String loaihopdong;
	int thoigian;
	Date tungay;
	Date denngay;

}
