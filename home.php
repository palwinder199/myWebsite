
		<?php
		$sliderQry="SELECT * FROM slider WHERE s_status='active' ORDER BY s_order ASC";
		$sliderSql=mysqli_query($con, $sliderQry) or die(mysqli_error($con));$sliderRows=mysqli_num_rows($sliderSql);
		if($sliderRows>0)
		{
		?>
		  <div id="SliderCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <?php
			  for($x=0;$x<$sliderRows;$x++)
			  {
				  ?>
			  <li data-target="#SliderCarousel" data-slide-to="<?php echo $x; ?>" <?php if($x==0){ ?>class="active"<?php } ?>></li>
				  <?php				  
			  }
			  ?>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			<?php
			$slide=1;
			while($sliderRow=mysqli_fetch_assoc($sliderSql))
			{
			?>	
			  <div class="carousel-item <?php if($slide==1){ echo "active"; } ?>">
				<img src="upload/<?php echo $sliderRow['s_image']; ?>" style="width:100%;">
			  </div>
			<?php
			$slide++;
			}
			?>
			</div>
			<?php
			if($sliderRows>1)
			{
			?>
			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#SliderCarousel" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#SliderCarousel" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			  </a>
			<?php
			}
			?>
		  </div>
		<?php
		/****************** /
		?>
        <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery">
            <!-- START REVOLUTION SLIDER 5.4.8 auto mode -->
            <div id="rev_slider_4_1" class="rev_slider fullwidthabanner rev_slider_4_1_height" data-version="5.4.8.1">
                
                <ul>

				<?php
				$slide=1;
				while($sliderRow=mysqli_fetch_assoc($sliderSql))
				{
				?>				
					<!-- SLIDE  -->
                    <li data-index="rs-1<?php echo $slide; ?>" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="upload/<?php echo $sliderRow['s_image']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="upload/<?php echo $sliderRow['s_image']; ?>"  alt=""  width="1920" height="730" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    </li>
				<?php
				$slide++;
				}
				?>
                </ul>
            </div>
        </div>
		<?php
		/******************/
		}
		?>
       <!-- END REVOLUTION SLIDER -->

    <!--site-main start-->
    <div class="site-main">
	<?php
	/************************ /
	$establishment_image=GetSingleData('establishment', 'e_id_pk', 1, 'e_image'); 
	if(file_exists("./upload/".$establishment_image) and $establishment_image!='')
	{
	?>
	<style>
	.static_details 
	{
		*margin: -6% 0 20px;
		*position: relative;
	}
	.static_details_left 
	{
		text-align: center;
	}
    </style>
    <div class="static_details">
		<div class="main">
			<div class="static_details_left">
				<img src="<?php echo "./upload/".$establishment_image; ?>" alt="Establishment" title="Establishment" style="width:100%">
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<?php
	}
	/************************/
	?>
        
        <!-- about-section -->
        <section class="ttm-row about-section clearfix" style="text-align:justify;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="<?php /*** / ?>pr-80<?php /***/ ?> res-991-pr-0">
                            <!-- section title -->
                            <div class="section-title <?php /*** / ?>pr-60<?php /***/ ?> res-991-pr-0 clearfix">
                                <div class="title-desc">
								<?php echo GetSingleData('about_me_overview', 'cp_id_pk', '1', 'cp_overview'); ?>
								</div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                </div>
				<?php
				/****************** /
				$ccQry = "SELECT * FROM company_certificates WHERE cc_status='active' ORDER BY cc_order ASC";
				$ccSql=mysqli_query($con, $ccQry) or die(mysqli_error($con));
				if(mysqli_num_rows($ccSql)>0)
				{
				?>
                <div class="row">
                    <div class="wrap-team team-slide owl-carousel" data-item="5" data-nav="false" data-dots="false" data-auto="true">
					<?php
					$modal=1;
					while($ccRow=mysqli_fetch_assoc($ccSql))
					{
					?>
                        <img class="img-fluid" src="upload/<?php echo $ccRow["cc_image"]; ?>" alt="image">
					<?php
					$modal++;
					}
					?>
                    </div>
                </div><!-- row end -->
				<?php
				}
				/******************/
				?>
            </div>
        </section>
        <!-- about-section end -->
        <?php /*** / ?>
        <!-- map-section -->
        <div class="ttm-row map-section clearfix">
            <div class="container">
                <div class="row">
                        <div class="col-md-12">
                        <!--map-start-->
                        <div class="map-wrapper">
							<style>
							  #map_canvas > iframe
							  {
								width:100% !important;
								height:100% !important;
							  }
							</style>
                            <div id="map_canvas">
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
                        <!--map-end-->
                    </div>
                </div>
            </div>
        </div>
        <!-- map-section end -->
        <?php /***/ ?>
        <!-- contact-form-section -->
        <section class="ttm-row contact-form-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="spacing-6 clearfix">
						    <?php /** / ?>
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h3 class="title">We’re Happy to Discuss Your Project and Answer any Question</h3>
                                </div>
                            </div><!-- section title end -->
						    <?php /**/ ?>
                            <ul class="ttm_contact_widget_wrapper">
                                <li>
									<?php
									$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Address' ORDER BY cd_type, cd_order ASC Limit 1";
									$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									$pRow=mysqli_fetch_assoc($pSql);
									?>
                                    <h6>Address</h6>
                                    <i class="ttm-textcolor-skincolor ti ti-location-pin"></i>
                                    <span><?php echo $pRow['cd_data']; ?></span>
                                </li>
                                <li> 
									<?php
									$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Email' ORDER BY cd_type, cd_order ASC";
									$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									?> 
                                    <h6>Email(s)</h6>
                                    <i class="ttm-textcolor-skincolor ti ti-comment"></i>
                                    <span>
									<?php
									while($pRow=mysqli_fetch_assoc($pSql))
									{
									?>
									  <a href="mailto:<?php echo $pRow['cd_data']; ?>"><?php echo $pRow['cd_data']; ?></a>
									  <br>
									<?php
									}
									?>
									</span>
                                </li>
                                <li>
								    <?php
									$pQry="SELECT * FROM contact_data WHERE cd_status='active' and  cd_type='Phone' ORDER BY cd_type, cd_order ASC";
									$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
									?>
                                    <h6>Contact Number(s)</h6>
                                    <i class="ttm-textcolor-skincolor ti ti-mobile"></i>
                                    <span>
									<?php
									while($pRow=mysqli_fetch_assoc($pSql))
									{
									?>
									  <a href="tel:<?php echo $pRow['cd_data']; ?>"><?php echo $pRow['cd_data']; ?></a>
									  <br>
									<?php
									}
									?>
									</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map-col-bg ttm-bgcolor-skincolor spacing-7 homeForm" id="homeForm-msg" style="margin-top:0!important;">
                            <!-- section title -->
                            <div class="section-title text-left with-desc clearfix">
                                <div class="title-header">
                                    <h2 class="title" style="font-size: 25px; line-height: 30px;">Let’s Start <br> The Conversation.</h2>
                                </div>
                            </div><!-- section title end -->
                            <form id="ttm-contactform" class="ttm-contactform wrap-form clearfix" method="post">
							    
							    <?php
							    $_SESSION["ClientToken"]=randomString(40);
							    ?>
							    <input type="hidden" name="token" id="token" value="<?php echo $_SESSION["ClientToken"]; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            <span class="text-input">
                                                <input type="text" value="" placeholder="Your Name" required="required" id="lpform-name" name="lpform-name">
												<div id="lpform-name-msg"></div>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            <span class="text-input">
                                                <input type="email" value="" placeholder="Your Email" required="required" id="lpform-email" name="lpform-email">
												<div id="lpform-email-msg"></div>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            <span class="text-input">
                                                <input type="text" value="" placeholder="Your Phone" required="required" id="lpform-phone" name="lpform-phone">
												<div id="lpform-phone-msg"></div>
                                            </span>
                                        </label>
                                    </div>
									<?php /** / ?>
                                    <div class="col-md-6">
                                        <label>
                                            <span class="text-input">
                                                <input name="venue" type="text" value="" placeholder="Subject" required="required">
                                            </span>
                                        </label>
                                    </div>
									<?php /**/ ?>
                                </div>
                                <label>
                                    <span class="text-input">
                                        <textarea  cols="40" rows="3" placeholder="Message" required="required" id="lpform-description" name="lpform-description"></textarea>
										<div id="lpform-description-msg"></div>
                                    </span>
                                </label>
                                <input name="submit" type="submit" id="submitFormBtn" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-bgcolor-darkgrey" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-form-section END-->

		<?php
		$clQry="SELECT * FROM companies_logo WHERE cl_status='active' ORDER BY cl_order ASC";
		$clSql=mysqli_query($con, $clQry) or die(mysqli_error($con));
		if(mysqli_num_rows($clSql)>0)
		{
		?>
        <!-- client-section -->
        <div class="ttm-row client-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- ttm-client -->
                        <div class="ttm-client clients-slide owl-carousel owl-theme owl-loaded mt-5" data-item="5" data-nav="false" data-dots="false" data-auto="true">
						
							<?php
							while($clRow=mysqli_fetch_assoc($clSql))
							{
							?>
                            <div class="client-box ttm-box-view-boxed-logo">
                                <div class="client">
                                    <div class="ttm-client-logo-tooltip" data-tooltip="client-01">
                                        <img class="img-fluid" src="upload/<?php echo $clRow["cl_image"]; ?>" alt="image">
                                    </div>
                                </div>
                            </div>
							<?php
							}
							?>
							
                        </div><!-- ttm-client end -->      
                    </div>
                </div>
            </div>
        </div>
        <!-- client-section end-->
		<?php
		}
		?>

    </div><!--site-main end-->
