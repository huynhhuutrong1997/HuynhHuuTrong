<?php include"../include-top.php";?>
<div id="wrapper">
  <!-- <?php
  if(isset($_POST['submitcode']))
  {
    if($_POST['txtCaptcha'] == NULL)
    {
      echo "Please enter your code";
    }
    else
    {
      if($_POST['txtCaptcha'] == $_SESSION['security_code'])
      {
        echo "ma lenh hop le";
      }
      else
      {
        echo "Ma lenh khong hop le";
      }
    }
  }
?> -->
<?php include"../menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
          <h1>System Apriori</h1>
          <hr>
        </div>
        <div class="container-fluid">
        	<div><h4 style="text-align: center;">Vui lòng nhập đúng code để Update Hệ Thống Gợi Ý Mới cho Website.</h4></div>
          <form method="post" action="c_admin.php?action=verifycode" class="edit-form">
          	<label>Enter Active Code</label><br>
            <div style="display: flex;line-height: 30px;margin-left: 400px;">
            <div style="line-height: 56px;">Captcha: <b style="background-color: grey;"><?php $md5_hash = md5(rand(0,999));$security_code = substr($md5_hash, 15, 5);$_SESSION["security_code"] = $security_code;echo $security_code;?></b></div>
          	<input class="input-code" type="text" name="txtCaptcha"><br/></div>
            <div style="display: flex;margin-left: 400px;">
              <label style="line-height: 36px;">Độ tin cậy: </label>
              <input style="height: 36px;margin-left: 40px;" type="number" min="0" max="100" name="conf" value="10" required="required">
              <button style="margin-top: -1px;margin-left: 30px;" type="submit" name="submitcode" class="btn btn-success btn-code">Submit</button>
            </div>
            <!-- <div style="margin-left: 315px;">
              <div class="fix-datetime"><lable class="fix-datetime-lable">Start Date: </lable><input id="startDate" width="276" value="2019-1-1 00:00:00" /></div>
              <div class="fix-datetime"><lable class="fix-datetime-lable">End Date: </lable><input id="endDate" width="276" value="2019-12-30 00:00:00" /></div>
            </div> -->  
          	
          </form>
          <?php
          	if (isset($mess)) {
          		?>
          		<div><?=$mess?></div>
          		<?php
          	}
          ?>
        </div>
    </div>
    <style type="text/css">
    	.edit-form {
    		margin-top: 10%;
    		box-shadow: 10px 5px 10px 500px #888888;
    		border-radius: 5px;
    		text-align: center;
    	}
    	.input-code, .btn-code {
    		margin: 10px 5px 10px 5px;
    	}
      .fix-datetime {
        display: flex;
        line-height: 38px;
        margin-bottom: 15px;
      }
      .fix-datetime-lable {
        margin-right: 20px;
      }
    </style>
</div>
<?php include"../include-bot.php";?>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<!-- <script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    // $('#startDate').datepicker({
    //     format: 'dd-MM-yyyy hh:mm:ss',
    //     uiLibrary: 'bootstrap4',
    //     iconsLibrary: 'fontawesome',
    //     minDate: today,
    //     maxDate: function () {
    //         return $('#endDate').val();
    //     }
    // });
    $('#endDate').datepicker({
        format: 'dd-MM-yyyy hh:mm:ss',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: function () {
            return $('#startDate').val();
        }
    });
    $('#startDate').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-BR'
      });
</script> -->



