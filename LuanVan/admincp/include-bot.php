<!-- Bootstrap core JavaScript-->
    <script src="../public/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../public/admin/js/sb-admin.min.js"></script>

    <!-- <footer class="sticky-footer">
	    <div class="container my-auto">
	        <div class="copyright text-center my-auto">
	            <span>Copyright © Your Website 2019</span>
	        </div>
	    </div>
	</footer> -->
	<div class="footer"><a class="scroll-to-top rounded btn-top" href="javascript:void(0);" title="Top" style="display: inline;">
        <i class="fas fa-angle-up"></i>
    </a></div>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){     
            if($(".btn-top").length > 0){
                $(window).scroll(function () {
                    var e = $(window).scrollTop();
                    if (e > 300) {
                        $(".btn-top").show()
                    } else {
                        $(".btn-top").hide()
                    }
                });
                $(".btn-top").click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    })
                })
            }       
        });
    </script>