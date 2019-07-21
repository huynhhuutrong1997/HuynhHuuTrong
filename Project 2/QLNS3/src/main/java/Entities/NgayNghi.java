package Entities;

import java.sql.Date;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.Set;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;

import org.hibernate.engine.internal.Cascade;

@Entity
public class NgayNghi {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	int mangaynghi;
	Date ngaynghi;
	@ManyToMany(fetch = FetchType.EAGER, cascade=CascadeType.PERSIST)
	@JoinTable(name = "NgayNghiNhanVien", joinColumns = {
			@JoinColumn(name = "mangaynghi", referencedColumnName = "mangaynghi") }, inverseJoinColumns = {
					@JoinColumn(name = "manv", referencedColumnName = "manv") })
	Set<NhanVien> NhanVien;

	public Date getNgaynghi() {
		return ngaynghi;
	}

	public void setNgaynghi(Date ngaynghi) {
		this.ngaynghi = ngaynghi;
	}

	public Set<NhanVien> getNhanVien() {
		return NhanVien;
	}

	public void setNhanVien(Set<NhanVien> nhanVien) {
		NhanVien = nhanVien;
	}

	public int getMangaynghi() {
		return mangaynghi;
	}

	public void setMangaynghi(int mangaynghi) {
		this.mangaynghi = mangaynghi;
	}
	
	public int getSoNgayNghi(Set<NgayNghi> listNgayNghi, Date date) {
		int songaynghi = 0;
		int thangnghi, thangchon;
		// calendarnghi la ngay nv nghi
		// calendarchon la ngay ma nguoi dung chon de dem so ngay nghi
		Calendar calendarnghi = GregorianCalendar.getInstance();
		Calendar calendarchon = GregorianCalendar.getInstance();
		// lay thang ma nguoi dung chon
		calendarchon.setTime(date);
		thangchon = calendarchon.get(Calendar.MONTH);
		// thuc hien so sanh va dem so ngay nghi
		for (NgayNghi nn : listNgayNghi) {
			calendarnghi.setTime(nn.getNgaynghi());
			thangnghi = calendarnghi.get(Calendar.MONTH);
			if (thangnghi == thangchon) {
				songaynghi++;
			}
		}
		return songaynghi;
	}
}
