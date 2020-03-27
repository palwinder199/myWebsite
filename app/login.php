<!DOCTYPE html>
<html lang="en">

<?php /** / ?>
<!-- Mirrored from themicon.co/theme/angle/v4.3/static-html/app/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2020 11:04:38 GMT -->
<?php /**/ ?>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <meta name="author" content="palwinder199">
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <title>Palwinder Singh - APP</title><!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/brands.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/regular.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/solid.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/fontawesome.css"><!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css"><!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="css/bootstrap.css" id="bscss"><!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="css/app.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-4 wd-xl">
         <!-- START card-->
         <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded" src="img/logo.png" alt="Image"></a></div>
            <div class="card-body">
               <p class="text-center py-2">SIGN IN TO CONTINUE.</p>
               <form method="post" class="mb-3" id="loginForm" data-parsley-validate novalidate>
				  <?php
				  $_SESSION["Token"]=randomString(40);
				  ?>
				  <input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>"/>
                  <div class="form-group">
                     <div class="input-group with-focus"><input class="form-control border-right-0" id="exampleInputEmail1" type="text" placeholder="Enter Username or Email" name="login-usernameoremail" autocomplete="off" required>
                        <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-envelope"></em></span></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group with-focus"><input class="form-control border-right-0" id="exampleInputPassword1" type="password" placeholder="Password" name="login-password" required>
                        <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                     </div>
                  </div>
			      <?php /** / ?>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox float-left mt-0"><label><input type="checkbox" value="" name="remember"><span class="fa fa-check"></span> Remember Me</label></div>
                     <div class="float-right"><a class="text-muted" href="recover.html">Forgot your password?</a></div>
                  </div>
			      <?php /**/ ?>
				  <button class="btn btn-block btn-primary mt-3" type="submit" id="loginForm-submit">Login</button>
               </form>
			   <?php /** / ?>
               <p class="pt-3 text-center">Need to Signup?</p><a class="btn btn-block btn-secondary" href="register.html">Register Now</a>
			   <?php /**/ ?>
            </div>
         </div><!-- END card-->
         <div class="p-3 text-center"><span class="mr-2">&copy;</span><span><?php echo date("Y"); ?></span><span class="mr-2">-</span><span>Palwinder Singh</span><br><span>Palwinder199.com</span></div>
      </div>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
   <script src="vendor/js-storage/js.storage.js"></script><!-- i18next-->
   <script src="vendor/i18next/i18next.js"></script>
   <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script><!-- JQUERY-->
   <script src="vendor/jquery/dist/jquery.js"></script><!-- BOOTSTRAP-->
   <script src="vendor/popper.js/dist/umd/popper.js"></script>
   <script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- PARSLEY-->
   <script src="vendor/parsleyjs/dist/parsley.js"></script><!-- =============== APP SCRIPTS ===============-->
   <script src="js/app.js"></script>
</body>


<?php /** / ?>
<!-- Mirrored from themicon.co/theme/angle/v4.3/static-html/app/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Mar 2020 11:04:38 GMT -->
<?php /**/ ?>
</html>