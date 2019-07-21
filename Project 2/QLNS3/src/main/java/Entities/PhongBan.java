package Entities;

import javax.persistence.Entity;
import javax.persistence.Id;

@Entity(name="PhongBan")
public class PhongBan {
	
	@Id
	String mapb;
	String tenpb;
	String sdtpb;
	
	public String getMapb() {
		return mapb;
	}
	public void setMapb(String mapb) {
		this.mapb = mapb;
	}
	public String getTenpb() {
		return tenpb;
	}
	public void setTenpb(String tenpb) {
		this.tenpb = tenpb;
	}
	public String getSdtpb() {
		return sdtpb;
	}
	public void setSdtpb(String sdtpb) {
		this.sdtpb = sdtpb;
	}

}
