<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="palwinder199" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php  
include("meta.php");
?>

<!-- favicon icon -->
<link rel="shortcut icon" href="images/favicon.png" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<!-- animate -->
<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<!-- owl-carousel -->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<!-- fontawesome -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>

<!-- themify -->
<link rel="stylesheet" type="text/css" href="css/themify-icons.css"/>

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="css/flaticon.css"/>


<!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">

    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">

<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="css/shortcodes.css"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="css/main.css"/>

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>

<!-- Google Analitics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58873552-1', 'auto');
  ga('send', 'pageview');
</script>
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2081538628792545');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2081538628792545&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>

<body>

    <!--page start-->
    <div class="page">
		
        <!-- preloader start -->
        <div id="preloader" style="display:none">
          <div id="status">&nbsp;</div>
        </div>
        <!-- preloader end -->

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-classic">
            <!-- ttm-header-wrap -->
            <div class="ttm-header-wrap">
                <!-- ttm-stickable-header-w -->
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner ttm-stickable-header">
							
							<?php /**/ ?>
							<!-- ttm-topbar-wrapper -->
							<div class="ttm-topbar-wrapper ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
								<div class="container">
									<div class="ttm-topbar-content">
										<?php /** / ?>
										<ul class="top-contact ttm-highlight-left text-left">
											<li><i class="fa fa-clock-o"></i><strong>Open Hours:</strong> Mon - Sat 9.00 - 18.00</li>
										</ul>
										<?php /**/ ?>
										<div class="topbar-right text-right">
											<ul class="top-contact">
												<?php /*************/ ?>
												<?php
												$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Phone' ORDER BY cd_type, cd_order ASC Limit 1";
												$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
												$pRow=mysqli_fetch_assoc($pSql);
												$THphone=$pRow['cd_data'];
												?>
												<li><i class="fa fa-phone"></i><a href="tel:<?php echo $THphone; ?>"><?php echo $THphone; ?></a></li>
												<?php /*************/ ?>
												<?php
												$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Email' ORDER BY cd_type, cd_order ASC Limit 1";
												$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
												$pRow=mysqli_fetch_assoc($pSql);
												$THemail=$pRow['cd_data'];
												?>
												<li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $THemail; ?>"><?php echo $THemail; ?></a></li>
											</ul>
											<?php /**/ ?>
											<div class="ttm-social-links-wrapper list-inline">
												<ul class="social-icons">
													<?php
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Twitter' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<?php
													}
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Facebook' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<?php
													}
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Instagram' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-instagram"></i>
														</a>
													</li>
													<?php
													}
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Linkedin' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
													<?php
													}
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Github' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-github"></i>
														</a>
													</li>
													<?php
													}
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Youtube' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-youtube"></i>
														</a>
													</li>
													<?php
													}
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Flickr' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-flickr"></i>
														</a>
													</li>
													<?php
													}
													$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Pinterest' ORDER BY cd_type, cd_order ASC";
													$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
													while($pRow=mysqli_fetch_assoc($pSql))
													{
													?>
													<li>
														<a href="<?php echo $pRow['cd_data']; ?>" target="_blank">
															<i class="fa fa-pinterest"></i>
														</a>
													</li>
													<?php
													}
													?>
												</ul>
											</div>
											<?php /**/ ?>
										</div>
									</div>
								</div>
							</div><!-- ttm-topbar-wrapper end -->
							<?php /**/ ?>
                            <div class="container">
                                <!-- site-branding -->
                                <div class="site-branding">
                                    <a class="home-link" href="./" title="palwinder199.com" rel="home">
                                        <img id="logo-img" class="img-center" src="images/palwinder199-logo-sm-2.png" alt="logo-img">
                                    </a>
                                </div><!-- site-branding end -->
                                <!--site-navigation -->
                                <div id="site-navigation" class="site-navigation">
                                    <div class="ttm-menu-toggle">
                                        <input type="checkbox" id="menu-toggle-form" />
                                        <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                            <span class="toggle-block toggle-blocks-1"></span>
                                            <span class="toggle-block toggle-blocks-2"></span>
                                            <span class="toggle-block toggle-blocks-3"></span>
                                        </label>
                                    </div>
                                    <nav id="menu" class="menu">
										<style>
										.makeScrollable
										{
											max-height: 400px; 
											overflow-x: scroll;
										}
										@media only screen and (max-width: 991px)
										{
											.makeScrollable
											{
												max-height: auto; 
												overflow-x: unset;
											}
										}
										</style>
                                        <ul class="dropdown">
                                           <li <?php if(!isset($_REQUEST["page-name"]) or (isset($_REQUEST["page-name"]) and $_REQUEST["page-name"]=='')){ ?>class="active"<?php } ?>><a href="./">Home</a>
                                            </li>
                                            <li <?php if(isset($_REQUEST["page-name"]) and ($_REQUEST["page-name"]=='about-me')){ ?>class="active"<?php } ?>><a href="about-me">About Me</a></li>
											<?php
											/**/
											$resume_file=GetSingleData('resume', 'resume_id_pk', 1, 'resume_file'); 
											if(file_exists("resume/".$resume_file) and $resume_file!='')
											{
											?>
											<li><a href="<?php echo "./resume/".$resume_file; ?>" target="_blank">Resume</a></li>
											<?php
											}
											/**/
											?>
                                            <li <?php if(isset($_REQUEST["page-name"]) and ($_REQUEST["page-name"]=='gallery')){ ?>class="active"<?php } ?>><a href="./gallery">Gallery</a></li>
                                            <li <?php if(isset($_REQUEST["page-name"]) and ($_REQUEST["page-name"]=='contact')){ ?>class="active"<?php } ?>><a href="./contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div><!-- ttm-stickable-header-w end-->
            </div><!--ttm-header-wrap end -->
        </header><!--header end-->
