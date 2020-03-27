<!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading">
                                <h1 class="title">Contact Us</h1>
                            </div><!-- /.page-title-captions -->
							<?php /** / ?>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="./"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; | &nbsp;</span>
                                <span>Contact Us</span>
                            </div>
							<?php /**/ ?>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end--> 

 <!--site-main start-->
    <div class="site-main">
	
        <!-- map-section -->
        <div class="ttm-row map-section clearfix">
            <div class="container">
                <div class="row">
                        <div class="col-md-12">
                        <!--map-start-->
                        <div class="map-wrapper" style="height:400px;">
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
        <!-- contact-form-section -->
        <section class="ttm-row contact-form-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="spacing-6 clearfix">
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h3 class="title">We’re Happy to Discuss Your Project and Answer any Question</h3>
                                </div>
                            </div><!-- section title end -->
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
                                    <h2 class="title">Let’s Start <br> The Conversation.</h2>
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
