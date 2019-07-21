$(function() {
    document.getElementById("select_luachon").onclick = function () {
                document.getElementById("input_div").style.display = 'block';
                document.getElementById("select_div").style.display = 'none';
                
            };
    document.getElementById("input_luachon").onclick = function () {
                document.getElementById("input_div").style.display = 'none';
                document.getElementById("select_div").style.display = 'block';
                
            };

   document.getElementById("select_luachondongmay").onclick = function () {
                document.getElementById("input_divdongmay").style.display = 'block';
                document.getElementById("select_divdongmay").style.display = 'none';
                
            };
    document.getElementById("input_luachondongmay").onclick = function () {
                document.getElementById("input_divdongmay").style.display = 'none';
                document.getElementById("select_divdongmay").style.display = 'block';
                
            };

           
});

