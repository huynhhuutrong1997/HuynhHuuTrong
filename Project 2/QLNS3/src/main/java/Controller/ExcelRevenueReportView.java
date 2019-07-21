package Controller;

import java.sql.Date;
import java.util.Map;
import java.util.Map.Entry;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.web.servlet.view.document.AbstractJExcelView;
import org.springframework.web.servlet.view.document.AbstractPdfView;

import Entities.NgayNghi;
import Entities.NhanVien;
import jxl.write.Label;
import jxl.write.WritableSheet;
import jxl.write.WritableWorkbook;

import com.lowagie.text.Document;
import com.lowagie.text.Table;
import com.lowagie.text.pdf.PdfWriter;

public class ExcelRevenueReportView extends AbstractJExcelView {

	@Override
	protected void buildExcelDocument(Map<String, Object> model, WritableWorkbook workbook, HttpServletRequest request,
			HttpServletResponse response) throws Exception {
		Map<String,NhanVien> revenueData = (Map<String,NhanVien>) model.get("revenueData");
		WritableSheet sheet = workbook.createSheet("Revenue Report", 0);
		
		 sheet.addCell(new Label(0, 0, "Mã Nhân Viên"));
	        sheet.addCell(new Label(1, 0, "Họ"));
	        sheet.addCell(new Label(2, 0, "Tên"));
	        sheet.addCell(new Label(3, 0, "Chức vụ"));
	        sheet.addCell(new Label(4, 0, "Lương cơ bản"));
	        sheet.addCell(new Label(5, 0, "Phụ cấp"));
	        sheet.addCell(new Label(6, 0, "Số ngày nghỉ"));
	        sheet.addCell(new Label(7, 0, "Tổng lương"));
	        int rowNum = 1;
	        Date adate = new Date(System.currentTimeMillis());
			NgayNghi nn = new NgayNghi();
			for (Entry<String, NhanVien> entry : revenueData.entrySet()) {
				
				float bacluongcoban = entry.getValue().getBacluong()*entry.getValue().getBangluong().getLuongcoban();
				String bacluongcoban1 = Float.toString(bacluongcoban);
				float phucap =entry.getValue().getBacphucap()*entry.getValue().getBangluong().getTienphucap();
				String phucap1 = Float.toString(phucap);
				
				int ngghi =nn.getSoNgayNghi(entry.getValue().getNgaynghi(),adate);
				String ngghi1 = Float.toString(ngghi);
				
				NhanVien nv = entry.getValue();
				float tongluong = bacluongcoban*26 - ngghi*bacluongcoban + phucap;
				String tongluong2 = Float.toString(tongluong);
				//create the row data
				sheet.addCell(new Label(0, rowNum, entry.getKey()));
			    sheet.addCell(new Label(1, rowNum, entry.getValue().getHonv()));
			    sheet.addCell(new Label(2, rowNum, entry.getValue().getTennv()));
			    sheet.addCell(new Label(3, rowNum, entry.getValue().getChucvu().getTencv()));
			    sheet.addCell(new Label(4, rowNum, bacluongcoban1));
			    sheet.addCell(new Label(5, rowNum, phucap1));
			    sheet.addCell(new Label(6, rowNum, ngghi1));
			    sheet.addCell(new Label(7, rowNum, tongluong2));
			    rowNum++;
	        }
		
	}


//	@Override
//	protected void buildPdfDocument(Map<String, Object> model, Document document, PdfWriter writer,
//			HttpServletRequest request, HttpServletResponse response) throws Exception {
//
//		Map<String,NhanVien> revenueData = (Map<String,NhanVien>) model.get("revenueData");
//		Table table = new Table(8);
//		table.addCell("Mã");
//		table.addCell("Họ");
//		table.addCell("Tên");
//		table.addCell("Chức vụ");
//		table.addCell("Lương cơ bản");
//		table.addCell("Phụ cấp");
//		table.addCell("Số ngày nghỉ");
//		table.addCell("Tổng lương");
//
//		for (Map.Entry<String, NhanVien> entry : revenueData.entrySet()) {
//			float bacluongcoban = entry.getValue().getBacluong()*entry.getValue().getBangluong().getLuongcoban();
//			String bacluongcoban1 = Float.toString(bacluongcoban);
//			float phucap =entry.getValue().getBacphucap()*entry.getValue().getBangluong().getTienphucap();
//			String phucap1 = Float.toString(phucap);
//			int ngghi =entry.getValue().getNgaynghi().size();
//			String ngghi1 = Float.toString(ngghi);
//			NhanVien nv = entry.getValue();
//			float tongluong = bacluongcoban*26 - ngghi*bacluongcoban + phucap;
//			String tongluong2 = Float.toString(tongluong);
//			table.addCell(entry.getKey());
//			table.addCell(entry.getValue().getHonv());
//			table.addCell(entry.getValue().getTennv());
//			table.addCell(entry.getValue().getChucvu().getTencv());
//			table.addCell(bacluongcoban1);
//			table.addCell(phucap1);
//			table.addCell(ngghi1);
//			table.addCell(tongluong2);
//			
//        }
//		
//		document.add(table);
//	
//	}
	
	
	

}
