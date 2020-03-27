<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="author" content="palwinder199" />
   <meta name="description" content="Bootstrap Admin App">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <title><?php echo $WEBTITLE; ?></title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/brands.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/regular.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/solid.css">
   <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/fontawesome.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="vendor/animate.css/animate.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="vendor/whirl/dist/whirl.css"><!-- TAGS INPUT-->
   <link rel="stylesheet" href="vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"><!-- SLIDER CTRL-->
   <link rel="stylesheet" href="vendor/bootstrap-slider/dist/css/bootstrap-slider.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">
   <!-- SLIDER CTRL-->
   <link rel="stylesheet" href="vendor/bootstrap-slider/dist/css/bootstrap-slider.css">
   <!-- CHOSEN-->
   <link rel="stylesheet" href="vendor/chosen-js/chosen.css">
   <!-- DATETIMEPICKER-->
   <link rel="stylesheet" href="vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
   <!-- Datatables-->
   <link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
   <link rel="stylesheet" href="vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css">
   <link rel="stylesheet" href="vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css">
   <!-- WYSIWYG-->
   <link rel="stylesheet" href="vendor/bootstrap-wysiwyg/css/style.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="css/app.css" id="maincss">
   <link rel="stylesheet" href="custom.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header"><a class="navbar-brand" href="./">
                  <div class="brand-logo"><img class="img-fluid" src="img/logo.png" alt="App Logo"></div>
                  <div class="brand-logo-collapsed"><img class="img-fluid" src="img/logo-single.png" alt="App Logo"></div>
               </a></div><!-- END navbar header-->
            <!-- START Left navbar-->
            <ul class="navbar-nav mr-auto flex-row">
               <li class="nav-item">
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops--><a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a><!-- Button to show/hide the sidebar on mobile. Visible on mobile only.--><a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a></li><!-- START User avatar toggle-->
            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="navbar-nav flex-row">
               <!-- Search icon-->
               <li class="nav-item"><a class="nav-link" href="#" data-search-open=""><em class="icon-magnifier"></em></a></li><!-- Fullscreen (only desktops)-->
               <li class="nav-item d-none d-md-block"><a class="nav-link" href="#" data-toggle-fullscreen=""><em class="fas fa-expand"></em></a></li>
               <!-- START logout button-->
               <li class="nav-item"><a class="nav-link" href="./logout"><em class="icon-power"></em></a></li>
            </ul><!-- END Right Navbar-->
            <!-- START Search form-->
			
			<?php 
			 $q="";
			 $fullURI=$_SERVER['REQUEST_URI'];
			 $qArr=explode("?q=",$fullURI);
			 if(isset($qArr[1]))
			 {
				 $q=$qArr[1];
			 }
			?>
            <form class="navbar-form" role="search" action="./search">
               <div class="form-group"><input class="form-control" type="text" name="q" value="<?php if(isset($q)){ echo $q; } ?>" placeholder="Type and hit enter ...">
                  <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
               </div><button class="d-none" type="submit">Submit</button>
            </form><!-- END Search form-->
         </nav><!-- END Top Navbar-->
      </header><!-- sidebar-->