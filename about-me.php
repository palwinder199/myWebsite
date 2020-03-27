
		<?php
		$sliderQry="SELECT * FROM about_me_slider WHERE cpl_status='active' ORDER BY cpl_order ASC";
		$sliderSql=mysqli_query($con, $sliderQry) or die(mysqli_error($con));$sliderRows=mysqli_num_rows($sliderSql);
		if($sliderRows>0)
		{
		?>
		  <div id="SliderCarousel" class="carousel slide" data-ride="carousel">
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
				<img src="upload/<?php echo $sliderRow['cpl_image']; ?>" style="width:100%;">
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
		}
		?>
       <!-- END REVOLUTION SLIDER -->
    <!--site-main start-->
    <div class="site-main">
	
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
            </div>
        </section>
        <!-- about-section end -->
       
    </div><!--site-main end-->
