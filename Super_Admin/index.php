<?php 

require_once __DIR__ . '/application/utils/app_config.php'; 
require_once __DIR__ . '/application/utils/SessionManager.php';

use SaloonHub\Application\Utils\SessionManager;

$sessionManager = new SessionManager();


if($sessionManager->has('logged_in_admin') )
{	
	
	?>
	<script>
	   window.location="<?php echo $app_name; ?>/view/home.php";
	</script>
	<?php
}
?>

<!-- user_name = furqan
     password = furqan@123
-->

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jobick : Job Admin Bootstrap 5 Template" />
    <meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template" />
    <meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template" />
    <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Saloon Hub Admin</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="<?php echo $app_name; ?>/public/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="alert alert-danger" style="min-width:250px;display: none;" id="alert_box">
                                        <h6 style="font-size:14px;" id="error"></h6>
                                    </div>
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="<?php echo $app_name; ?>/public/images/salon.png" alt="" width="120px"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form id="formLogin" onsubmit="handleSignIn('formLogin',event)" method="post" action="<?php echo $app_name ?>/application/auth/login.php">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" name="user_name" class="form-control user_name" placeholder="Username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control password" placeholder="Password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me In</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo $app_name; ?>/public//vendor/global/global.min.js"></script>
    <script src="<?php echo $app_name; ?>/public//js/custom.min.js"></script>
    <script src="<?php echo $app_name; ?>/public//js/dlabnav-init.js"></script>
    <script src="<?php echo $app_name; ?>/public//js/styleSwitcher.js"></script>
    <script src="<?php echo $app_name ?>/public/js/ajax-form-request.js"></script>

    <script>
        function handleSignIn(Form_Id, event) {
            handleAjaxFormRequest(Form_Id, event, SuccesCallBack)
        }
        const SuccesCallBack = (data) => {

            $('#alert_box').removeClass('alert-danger');
            $('#alert_box').addClass("alert-success")
            $('#alert_box').show();

            $('#error').html("" + data.responseMessage + "<span><strong>&nbsp;Redirecting...</strong></span>");



            window.location = "<?php echo $app_name ?>/view/home.php";

        }
        <script src="<?php echo $app_name; ?>/text-to-speech.js"></script>
    </script>
</body>

</html>