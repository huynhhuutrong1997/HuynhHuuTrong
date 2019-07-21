package Entities;

import javax.persistence.Entity;
import javax.persistence.Id;

@Entity
public class TrinhDoHocVan {
	
	@Id
	String matdhv;
	String tentdhv;
	String chuyennganh;
	
	public String getChuyennganh() {
		return chuyennganh;
	}
	public void setChuyennganh(String chuyennganh) {
		this.chuyennganh = chuyennganh;
	}
	public String getMatdhv() {
		return matdhv;
	}
	public void setMatdhv(String matdhv) {
		this.matdhv = matdhv;
	}
	public String getTentdhv() {
		return tentdhv;
	}
	public void setTentdhv(String tentdhv) {
		this.tentdhv = tentdhv;
	}


}
