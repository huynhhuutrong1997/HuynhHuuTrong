package Entities;

import javax.persistence.Entity;
import javax.persistence.Id;

@Entity(name="BangLuong")
public class BangLuong {
	@Id
	String maluong;
	int tienphucap;
	int luongcoban;
	
	
	
	public String getMaluong() {
		return maluong;
	}
	public void setMaluong(String maluong) {
		this.maluong = maluong;
	}
	public int getTienphucap() {
		return tienphucap;
	}
	public void setTienphucap(int tienphucap) {
		this.tienphucap = tienphucap;
	}
	public int getLuongcoban() {
		return luongcoban;
	}
	public void setLuongcoban(int luongcoban) {
		this.luongcoban = luongcoban;
	}
	

}
