/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Process;


public class CheckKyTu {
    //Tạo 1 mãng kiểu char chứa ký  tự đặt biệt
    public static char[] KyTu = {'~','`','!','@','#','$','%','^','&','*'};
    public static char[] Num = {'0','1','2','3','4','5','6','7','8','9'};
    public static String[] GT = {"Nam","Nữ","Khác"};
    public static boolean CheckKT(String KT)
    {
        boolean b = false; //mặt định chuổi truyền vào chưa có ký tự đặt biệt
        char a[]= KT.toCharArray();
        //tách chuổi KT thành mản a ký tự
        for(int i=0; i<a.length;i++)
        {
            for(int j=0; j<KyTu.length; j++)
            {
                if(a[i]==KyTu[j])//phát hiện có ký tự đặt biệt trong chuổi KT
                    b=true;
            }
        }
        return b;
    }
    public static boolean CheckNum(String KT)
    {
        boolean b = false;
        char a[]= KT.toCharArray();
        //tách chuổi KT thành mản a ký tự
        for(int i=0; i<a.length;i++)
        {
            for(int j=0; j<Num.length; j++)
            {
                if(a[i]==Num[j])//phát hiện có ký tự số trong chuổi KT
                    b=true;
            }
        }
        return b;
    }
    
}
