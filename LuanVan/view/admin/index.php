<?php include"include-top.php";
?>

<div id="wrapper">
<?php include"menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol> -->
            <h1>Trang Chủ</h1>
            <hr>
        </div>
        <div class="container-fluid">
        <form method="POST"  enctype="multipart/form-data">
           <div class="home_bia">
               <div class="home_anhbia">
                     <div id="thumbbox">
                        <?php 
                            if ($anhbia =='') {
                                ?>
                                <img id="thumbimage" src="../public/images/background/anhbia.jpg">
                                <?php
                            }else{
                                ?>
                                <img id="thumbimage" src="../public/images/background/<?=$anhbia?>">
                                <?php
                            }
                        ?>
                        
                    </div>
                    <div class="home_uploadanh">
                         <div id="myfileupload">
                           <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);"  />
                          
                         </div>
                         <div id="boxchoice" class="home_choicebia">
                            <a href="javascript:" class="Choicefilebia">Đổi ảnh bìa</a>
                            <p style="clear:both"></p>
                         </div>
                         <!--  <label class="filename"></label> -->
                    </div>

               </div>
               <div class="home_inf">
                   <div class="home_avatar">
                      <?php 
                        if ($avatar == "") {
                            ?>
                            <img id="thumbimage2" src="../public/images/avatar/avatar.jpg">
                            <?php
                        }else{
                            ?>
                             <img id="thumbimage2" src="../public/images/avatar/<?=$avatar?>">
                            <?php
                        }
                      ?>
                      <div class="uploadanh home_uploadavatar">
                         <div id="myfileupload2">
                           <input type="file" id="uploadfile2" name="ImageUpload1"  onchange="anh2(this);"  />
                          
                         </div>
                         <div id="boxchoice2" class="home_choice">
                          <a href="javascript:" class="Choicefileavatar">Sửa</a>
                          <p style="clear:both"></p>
                         </div>
                    </div> 
                   </div>
                   <div class="home_ten">
                       <p><?=$hoten?></p>
                   </div>
               </div>
           </div>
           <div class="home_content">
               <div class="div_thongtin"><label class="label_thongtin">Tên Shop:</label><input type="text" name="tenshop" value="<?=$tenshop?>"></div>
                <div class="div_thongtin"><label class="label_thongtin">Địa Chỉ:</label><input type="text" name="diachi" value="<?=$diachi?>"></div>
                <div class="div_thongtin"><label class="label_thongtin">SĐT:</label><input type="number" name="sdt" value="<?=$sdt?>"></div>
                <div class="home_banner">
                    <label>Banner:</label>
                    <hr>
                    <div class="home_anh">
                        <?php
                            if ($banner == '') {
                                ?>
                                 <img id="thumbimage3" src="../public/images/banner/banner.jpg">
                                <?php
                            }else{
                                ?>
                                <img id="thumbimage3" src="../public/images/banner/<?=$banner?>">
                                <?php
                            }
                        ?>
                       
                        <div class="home_uploadbanner">
                                 <div id="myfileupload3">
                                   <input type="file" id="uploadfile3" name="ImageUpload2" onchange="anh3(this);"  />
                                   <!--      Name  mà server request về sẽ là ImageUpload-->
                                  
                                 </div>
                            <div id="thumbbox3">
                                 <div id="boxchoice3" class="home_Choicefile3">
                                  <a href="javascript:" class="Choicefile3">Đổi Banner</a>
                                  <p style="clear:both"></p>
                                 </div>
                                  <!-- <label class="filename3"></label> -->
                            </div>
                        </div>
                    </div>
                   
            </div>
           <div class="home_button">
                    <button type="submit" name="btn_luu">Lưu</button>
            </div>
         </form>  
        </div>
    </div>
</div>
<?php include"include-bot.php"; ?>

