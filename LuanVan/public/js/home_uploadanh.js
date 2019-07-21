 function  readURL(input,thumbimage) {
   if  (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
   var  reader = new FileReader();
    reader.onload = function (e) {
    $("#thumbimage").attr('src', e.target.result);
     }
     reader.readAsDataURL(input.files[0]);
    }
    else  { // Sử dụng cho IE
      if (input.value != "") {
        $("#thumbimage").attr('src', input.value);
      }
      
  
    }
    $("#thumbimage").show();
    $('.filename').text($("#uploadfile").val());
    $('.Choicefilebia').css('background', '#C4C4C4');
    $('.Choicefilebia').css('cursor');
    // $(".removeimg").show();
    // $(".Choicefilebia").unbind('click'); //Xóa sự kiện  click trên nút .Choicefilebia
          
  }
  $(document).ready(function () {
   $(".Choicefilebia").bind('click', function  () { //Chọn file khi .Choicefilebia Click
    $("#uploadfile").click();
               
   });
   // $(".removeimg").click(function () {//Xóa hình  ảnh đang xem
   //    $("#thumbimage").attr('src', '').hide();
   //    $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
   //    $(".removeimg").hide();
   //    $(".Choicefilebia").bind('click', function  () {//Tạo lại sự kiện click để chọn file
   //     $("#uploadfile").click();
   //    });
   //    $('.Choicefilebia').css('background','#0877D8');
   //    $('.Choicefilebia').css('cursor', 'pointer');
   //    $(".filename").text("");
   //  });
   })
//ảnh 2
   function  anh2(input2,thumbimage2) {
   if  (input2.files && input2.files[0]) { //Sử dụng  cho Firefox - chrome
   var  reader = new FileReader();
    reader.onload = function (e) {
    $("#thumbimage2").attr('src', e.target.result);
     }
     reader.readAsDataURL(input2.files[0]);
    }
    else  { // Sử dụng cho IE
      if (input2.value != "") {
        $("#thumbimage2").attr('src', input2.value);
      }
      
  
    }
    $("#thumbimage2").show();
    $('.filename2').text($("#uploadfile2").val());
    // $('.Choicefileavatar').css('background', '#C4C4C4');
    $('.Choicefileavatar').css('cursor');
    // $(".removeimg2").show();
    // $(".Choicefileavatar").unbind('click'); //Xóa sự kiện  click trên nút .Choicefile
          
  }
  $(document).ready(function () {
   $(".Choicefileavatar").bind('click', function  () { //Chọn file khi .Choicefile Click
    $("#uploadfile2").click();
               
   });
   // $(".removeimg2").click(function () {//Xóa hình  ảnh đang xem
   //    $("#thumbimage2").attr('src', '').hide();
   //    $("#myfileupload2").html('<input type="file" id="uploadfile2"  onchange="anh2(this);" />');
   //    $(".removeimg2").hide();
   //    $(".Choicefileavatar").bind('click', function  () {//Tạo lại sự kiện click để chọn file
   //     $("#uploadfile2").click();
   //    });
   //    $('.Choicefileavatar').css('background','#0877D8');
   //    $('.Choicefileavatar').css('cursor', 'pointer');
   //    $(".filename2").text("");
   //  });
   })
function  anh3(input3,thumbimage3) {
   if  (input3.files && input3.files[0]) { //Sử dụng  cho Firefox - chrome
   var  reader = new FileReader();
    reader.onload = function (e) {
    $("#thumbimage3").attr('src', e.target.result);
     }
     reader.readAsDataURL(input3.files[0]);
    }
    else  { // Sử dụng cho IE
      if (input3.value != "") {
        $("#thumbimage2").attr('src', input3.value);
      }
  
    }
    $("#thumbimage3").show();
    $('.filename3').text($("#uploadfile3").val());
    // $('.Choicefile3').css('background', '#C4C4C4');
    // $('.Choicefile3').css('cursor', 'default');
    // $(".removeimg3").show();
    // $(".Choicefile3").unbind('click'); //Xóa sự kiện  click trên nút .Choicefile
          
  }
  $(document).ready(function () {
   $(".Choicefile3").bind('click', function  () { //Chọn file khi .Choicefile Click
    $("#uploadfile3").click();
               
   });
   // $(".removeimg3").click(function () {//Xóa hình  ảnh đang xem
   //    $("#thumbimage3").attr('src', '').hide();
   //    $("#myfileupload3").html('<input type="file" id="uploadfile3"  onchange="anh3(this);" />');
   //    $(".removeimg3").hide();
   //    $(".Choicefile3").bind('click', function  () {//Tạo lại sự kiện click để chọn file
   //     $("#uploadfile3").click();
   //    });
   //    $('.Choicefile3').css('background','#0877D8');
   //    $('.Choicefile3').css('cursor', 'pointer');
   //    $(".filename3").text("");
   //  });
   })

  