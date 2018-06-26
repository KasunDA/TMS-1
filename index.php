<?php
	session_start();
	
	if( isset( $_SESSION['login_id'] )  &&  $_SESSION['login_id'] != NULL  )
	{
		if($_SESSION['role'] == 'reporting')
        {
            echo '<script> location.assign("php/recivePartyPayment.php") </script>';    
        }
        else
        {
            echo '<script> location.assign("php/container-entry.php") </script>';    
        }
	}

	require 'php/connection.php';

	$message = false;

	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$username = mysqli_real_escape_string($mycon, $_POST['username'] );
		$pass = mysqli_real_escape_string($mycon, $_POST['pass'] );

		$q = mysqli_query($mycon,"SELECT * from login where username='$username' and pass=MD5('$pass') and status=1 ");

		if($r = mysqli_fetch_array($q) )
		{
			
        	$_SESSION["login_id"] = $r["login_id"];
			$_SESSION['name'] = $r['name'];
            $_SESSION['username'] = $r['username'];
            $_SESSION['role']     = $r['role'];

			// echo '<script> alert(" login id is=  '.$r['login_id'].' username is '.$r['username'] .'") </script>';   
            if($_SESSION['role'] == 'reporting')
            {
                echo '<script> location.assign("php/recivePartyPayment.php") </script>';    
            }
            else if($_SESSION['role'] == 'only view')
            {
                $_SESSION['disable_btn'] = 'true';
                echo '<script> location.assign("php/container-entry.php") </script>';    
            }
            else
            {
                echo '<script> location.assign("php/container-entry.php") </script>';    
            }
			// echo "<script> location.assign('php/index.php') </script>";
		}
		else
		{
			$message = true;	
		}
	}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>TMS | Login </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <!-- <a href="index.html">
                <img src="assets/pages/img/logo-big.png" alt="" /> </a> -->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" method="post">
                <h3 class="form-title">Login to your account</h3>
                <?php
                	if($message)
                	{?>
						<div class="alert alert-danger">
		                    <!-- <button class="close" data-close="alert"></button> -->
		                    <span> Wrong username or password. </span>
                		</div>
                	<?php }//END OF IF
                ?>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" required placeholder="username" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" required placeholder="password" name="pass" /> </div>
                </div>
                <div class="form-actions">
                    <!-- <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                        <span></span>
                    </label> -->
                    <button type="submit" class="btn green pull-right" name="btnlogin"> Login </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <!-- <div class="copyright"> 2014 &copy; Metronic - Admin Dashboard Template. </div> -->
        <div class="copyright"> 2018 &copy; Butt Brothers Transport co. Website Credit
            <a href="https://logicsaint.com" target="_blank">Logic Saint</a>
        </div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="assets/pages/scripts/login-4.min.js" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
<script type="text/javascript">
	var Login=function()
	{
		var e=function(){
			$(".login-form").validate({errorElement:"span",errorClass:"help-block",focusInvalid:!1,rules:{username:{required:!0},password:{required:!0},remember:{required:!1}},messages:{username:{required:"Username is required."},password:{required:"Password is required."}},
				invalidHandler:function(e,r){$(".alert-danger",$(".login-form")).show()},
				highlight:function(e){$(e).closest(".form-group").addClass("has-error")},
				success:function(e){e.closest(".form-group").removeClass("has-error"),e.remove()},
				errorPlacement:function(e,r){e.insertAfter(r.closest(".input-icon"))},
				submitHandler:function(e){e.submit()}}),$(".login-form input").keypress(function(e){return 13==e.which?($(".login-form").validate().form()&&$(".login-form").submit(),!1):void 0})},r=function(){$(".forget-form").validate({errorElement:"span",errorClass:"help-block",focusInvalid:!1,ignore:"",rules:{email:{required:!0,email:!0}},messages:{email:{required:"Email is required."}},
				invalidHandler:function(e,r){},
				highlight:function(e){$(e).closest(".form-group").addClass("has-error")},
				success:function(e){e.closest(".form-group").removeClass("has-error"),e.remove()},
				errorPlacement:function(e,r){e.insertAfter(r.closest(".input-icon"))},
				submitHandler:function(e){e.submit()}}),$(".forget-form input").keypress(function(e){return 13==e.which?($(".forget-form").validate().form()&&$(".forget-form").submit(),!1):void 0}),jQuery("#forget-password").click(function(){jQuery(".login-form").hide(),jQuery(".forget-form").show()}),jQuery("#back-btn").click(function(){jQuery(".login-form").show(),jQuery(".forget-form").hide()})},s=function(){function e(e){if(!e.id)return e.text;var r=$('<span><img src="assets/global/img/flags/'+e.element.value.toLowerCase()+'.png" class="img-flag" /> '+e.text+"</span>");return r}jQuery().select2&&$("#country_list").size()>0&&($("#country_list").select2({placeholder:'<i class="fa fa-map-marker"></i>&nbsp;Select a Country',templateResult:e,templateSelection:e,width:"auto",
				escapeMarkup:function(e){return e}}),$("#country_list").change(function(){$(".register-form").validate().element($(this))})),$(".register-form").validate({errorElement:"span",errorClass:"help-block",focusInvalid:!1,ignore:"",rules:{fullname:{required:!0},email:{required:!0,email:!0},address:{required:!0},city:{required:!0},country:{required:!0},username:{required:!0},password:{required:!0},rpassword:{equalTo:"#register_password"},tnc:{required:!0}},messages:{tnc:{required:"Please accept TNC first."}},
				invalidHandler:function(e,r){},
				highlight:function(e){$(e).closest(".form-group").addClass("has-error")},
				success:function(e){e.closest(".form-group").removeClass("has-error"),e.remove()},
				errorPlacement:function(e,r){"tnc"==r.attr("name")?e.insertAfter($("#register_tnc_error")):1===r.closest(".input-icon").size()?e.insertAfter(r.closest(".input-icon")):e.insertAfter(r)},
				submitHandler:function(e){e.submit()}}),$(".register-form input").keypress(function(e){return 13==e.which?($(".register-form").validate().form()&&$(".register-form").submit(),!1):void 0}),jQuery("#register-btn").click(function(){jQuery(".login-form").hide(),jQuery(".register-form").show()}),jQuery("#register-back-btn").click(function(){jQuery(".login-form").show(),jQuery(".register-form").hide()})};return{init:function(){e(),r(),s(),$.backstretch(["assets/pages/media/bg/1.jpg","assets/pages/media/bg/2.jpg","assets/pages/media/bg/3.jpg","assets/pages/media/bg/4.jpg"],{fade:1e3,duration:8e3})}}}();jQuery(document).ready(function(){Login.init()});
</script>

</html>