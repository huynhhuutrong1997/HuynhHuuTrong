/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;

import java.util.regex.Matcher;
import java.util.regex.Pattern;
public class CheckSDT {
     public static boolean checkNumberPhone(String number) {
        Pattern pattern = Pattern.compile("^[0-9]*$");
        Matcher matcher = pattern.matcher(number);
        boolean b = false;
        if (!matcher.matches()) {
            return b = true;//"Số điện thoại không hợp lệ!";//Chuỗi nhập vào không phải là số
        } else if (number.length() == 10 || number.length() == 11) {
            if (number.length() == 10) {
                if (number.substring(0, 2).equals("09")) {
                    return b = false ;//"Số điện thoại hợp lệ"
                } else {
                    return b = true; //"số điện thoại không hợp lệ!";
                }
            } else if (number.substring(0, 2).equals("01")) {
                return b = false ;//"Số điện thoại hợp lệ"
            } else {
                return b = true;//"số điện thoại không hợp lệ!";
            }
        } else {
            return b = true ;//"số điện thoại không hợp lệ!";//Độ dài chuỗi không hợp lệ!
        }
    }
    
}
