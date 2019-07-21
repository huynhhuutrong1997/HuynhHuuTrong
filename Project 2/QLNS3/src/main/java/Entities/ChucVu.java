package Entities;

import javax.persistence.Entity;
import javax.persistence.Id;

@Entity(name="ChucVu")
public class ChucVu {
	@Id
	String macv;
	String tencv;
	String motacongviec;
	
	public String getMacv() {
		return macv;
	}
	public void setMacv(String macv) {
		this.macv = macv;
	}
	public String getTencv() {
		return tencv;
	}
	public void setTencv(String tencv) {
		this.tencv = tencv;
	}
	public String getMotacongviec() {
		return motacongviec;
	}
	public void setMotacongviec(String motacongviec) {
		this.motacongviec = motacongviec;
	}
	

}
