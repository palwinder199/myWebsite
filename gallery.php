
        <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading">
                                <h1 class="title">Gallery</h1>
                            </div><!-- /.page-title-captions -->
							<?php /** / ?>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.html"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep">&nbsp; | &nbsp;</span>
                                <span>Project Style 2</span>
                            </div> 
							<?php /**/ ?> 
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->

    <!--site-main start-->
    <div class="site-main">

        <!-- faq-section -->
        <section class="ttm-row project-style2-section clearfix">
            <div class="container">
                <div class="row">
				
				  <?php
				  $gQry="SELECT * FROM gallery WHERE g_status='active' ORDER BY g_order asc";
				  $gSql=mysqli_query($con, $gQry) or die(mysqli_error($con));
				  if(mysqli_num_rows($gSql)==0)
				  {
					  ?>
					  <h3>No data found.</h3>
					  <?php
				  }
				  $img=0;
				  while($gRow=mysqli_fetch_assoc($gSql))
				  {
					  $img++;
				  ?>
                    <div class="col-md-3">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-portfolio ttm-box-view-top-image">
                            <div class="ttm-box-view-content-inner">
                                <!-- featured-thumbnail -->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="<?php echo "./upload/gallery/".$gRow['g_img']; ?>" alt="image"></a>
                                </div><!-- featured-thumbnail end-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="featured-iconbox ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery<?php echo $img; ?>]" title="" data-rel="prettyPhoto" href="<?php echo "./upload/gallery/".$gRow['g_img']; ?>"><i class="ti ti-search"></i></a>
										<?php /** / ?>
                                        <a href="portfolio-single.html" class="ttm_link"><i class="ti ti-link"></i></a>
										<?php /**/ ?>
                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div>
							<?php /** / ?>
                            <div class="featured-content featured-content-portfolio text-center box-shadow2">
                                <div class="featured-title">
                                    <h5><a href="portfolio-single.html">Business Seminar</a></h5>
                                </div>
                            </div>
							<?php /**/ ?>
                        </div><!-- featured-imagebox -->
                    </div>
				  <?php
				  }
				  ?>
                </div>
            </div>
        </section>
        <!-- faq-section end -->
        
    </div><!--site-main end-->
