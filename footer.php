
    <!--footer start-->
    <footer class="footer widget-footer clearfix">
        <div class="second-footer ttm-textcolor-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget widget_text  clearfix">
							<?php /************** / ?>
                            <h3 class="widget-title">About Business</h3>
							<?php /**************/ ?>
                            <div class="textwidget widget-text">
								<img id="logo-img" class="img-center" src="images/palwinder199-logo-sm-2.png" alt="logo-img">
                                <br>
                                <br>
                                <br>
                                <div class="social-icons circle social-hover" style="text-align:center;">
                                    <ul class="list-inline">
									  <?php
									  $pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Facebook' ORDER BY cd_type, cd_order ASC Limit 1";
									  $pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									  $pRow=mysqli_fetch_assoc($pSql);
									  if(mysqli_num_rows($pSql)>0)
									  {
									  ?>
                                        <li class="social-facebook"><a class="tooltip-top" target="_blank" href="<?php echo $pRow["cd_data"]; ?>" data-tooltip="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									  <?php
									  }
									  $pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Twitter' ORDER BY cd_type, cd_order ASC Limit 1";
									  $pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									  $pRow=mysqli_fetch_assoc($pSql);
									  if(mysqli_num_rows($pSql)>0)
									  {
									  ?>
                                        <li class="social-twitter"><a class="tooltip-top" target="_blank" href="<?php echo $pRow["cd_data"]; ?>" data-tooltip="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									  <?php
									  }
									  $pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Email' ORDER BY cd_type, cd_order ASC Limit 1";
									  $pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									  $pRow=mysqli_fetch_assoc($pSql);
									  if(mysqli_num_rows($pSql)>0)
									  {
									  ?>
                                        <li class="social-flickr"><a class=" tooltip-top" href="mailto:<?php echo $pRow['cd_data']; ?>" data-tooltip="Email"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
									  <?php
									  }
									  $pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Phone' ORDER BY cd_type, cd_order ASC Limit 1";
									  $pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									  $pRow=mysqli_fetch_assoc($pSql);
									  if(mysqli_num_rows($pSql)>0)
									  {
									  ?>
                                        <li class="social-linkedin"><a class=" tooltip-top" target="_blank" href="tel:<?php echo $pRow['cd_data']; ?>" data-tooltip="Phone"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
									  <?php
									  }
									  ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget widget_nav_menu clearfix">
                           <h3 class="widget-title">Quick Links</h3>
                            <ul id="menu-footer-services">
                                <li><a href="./">Home</a></li>
                                <li><a href="./about-me">About Me</a></li>
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
                                <li><a href="./gallery">Gallery</a></li>
                                <li><a href="./contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget widget_text clearfix">
                            <h3 class="widget-title">Get In Touch</h3>
							<div class="textwidget widget-text">
                                <ul class="ttm-our-location-list">
                                    <li>
										<i class="fa fa-map-marker"></i> 
										<?php
										$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Address' ORDER BY cd_type, cd_order ASC Limit 1";
										$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
										$pRow=mysqli_fetch_assoc($pSql);
										echo $pRow['cd_data'];
										?>
									</li>
									<?php
									
									$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Phone' ORDER BY cd_type, cd_order ASC";
									$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									while($pRow=mysqli_fetch_assoc($pSql))
									{
									?>
                                    <li>
										<i class="fa fa-phone"></i>
										<?php
										echo $pRow['cd_data'];
										?>
									</li>
									<?php
									}
									$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Email' ORDER BY cd_type, cd_order ASC";
									$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									while($pRow=mysqli_fetch_assoc($pSql))
									{
									?>
                                    <li>
										<i class="fa fa-envelope-o"></i>
										<?php
										echo $pRow['cd_data'];
										?>
									</li>
									<?php
									}
									?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget flicker_widget clearfix">
                           <h3 class="widget-title">Google Map</h3>
                           <div class="textwidget widget-text">
								<style>
								  #map_footer > iframe
								  {
									width:100% !important;
									height:200px !important;
								  }
								</style>
								<div id="map_footer">
								<?php
								$pQry="SELECT * FROM contact_data WHERE cd_status='active' and cd_type='Embedded Map' ORDER BY cd_type, cd_order DESC";
								$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
								while($pRow=mysqli_fetch_assoc($pSql))
								{
									echo $pRow["cd_data"];
								}
								?>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-text ttm-textcolor-white">
            <div class="container">
                <div class="row copyright">
                    <div class="col-md-12">
                        <div class="">
                            <span>Copyright © <?php echo date("Y"); ?>&nbsp;<a href="javascript:;">Palwinder199.com</a>.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->

</div><!-- page end -->


    <!-- Javascript -->

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.js"></script>    
    <script src="js/jquery-waypoints.js"></script>    
    <script src="js/jquery-validate.js"></script> 
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/numinate.min6959.js?ver=4.9.3"></script>
    <script src="js/main.js"></script>
    <script src="js/chart.js"></script>

    <!-- Revolution Slider -->
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="revolution/js/slider.js"></script>
    

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    

    <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="custom.js"></script>

    <!-- Javascript end-->
		
        <section>
		  <!-- Modal -->
		  <div class="modal fade" id="myModal">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Get Price/Quote Now</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" id="product-quote-form-result">
					<form id="product-quote-form" name="product-quote-form" method="post" class="product-quote-form nobottommargin">
					  <?php
					  if(!isset($_SESSION["ClientToken"]))
					  {
					  $_SESSION["ClientToken"]=randomString(40);
					  }
					  ?>
					  <input type="hidden" name="token" id="token" value="<?php echo $_SESSION["ClientToken"]; ?>"  >
					  <input type="text" class="required input-block-level" id="product-quote-form-name" name="product-quote-form-name" value="" placeholder="Full Name" />
					  <div id="product-quote-form-name-msg"></div>
					  <br>
					  <input type="text" class="required email input-block-level" id="product-quote-form-email" name="product-quote-form-email" value="" placeholder="Email Address" />
					  <div id="product-quote-form-email-msg"></div>
					  <br>
					  <input type="text" class="required phone input-block-level" id="product-quote-form-phone" name="product-quote-form-phone" value="" placeholder="Phone" />
					  <div id="product-quote-form-phone-msg"></div>
					  <br>
					  <textarea class="required input-block-level short-textarea" id="product-quote-form-message" name="product-quote-form-message" rows="8" cols="10" placeholder="Describe Your BUYING Requirement (Tips on getting accurate quotes. Please include product name, order quantity, usage, special requests if any in your inquiry.)"></textarea>
					  <div id="product-quote-form-message-msg"></div>
					  <br>
					  <button type="submit" id="product-quote-form-submit" name="product-quote-form-submit" class="btn btn-primary" value="submit">Submit</button>
					  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</form>
				</div>
				<?php /*** / ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				<?php /***/ ?>
			  </div>
			</div>
		  </div>
        </section>
</body>
<?php
$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Phone' ORDER BY cd_type, cd_order ASC";
$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
$pRow=mysqli_fetch_assoc($pSql);
//echo $pRow['cd_data'];
?>
</html><!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "<?php echo $pRow['cd_data']; ?>", // WhatsApp number
            call_to_action: "Message", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->