
        <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading">
                                <h1 class="title">Products</h1>
                            </div> <!-- /.page-title-captions -->
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
				<?php echo GetSingleData('products_overview', 'po_id_pk', '1', 'po_overview'); ?>
				</div>
				<?php
			  $row=0;
			  $concat="";
			  if(isset($_REQUEST['id']) and $_REQUEST['id']>0)
			  {
				  $concat=" and pc_id_fk='".addslashes($_REQUEST['id'])."'";
			  }			  
			  $pQry="select * from products where p_status='active' ".$concat." order by length(p_order), p_order asc";
			  $pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
			  while($pRow=mysqli_fetch_assoc($pSql))
			  {
				  if($row==0)
				  {
				  ?>
				  <div class="row">
				  <?php
				  } 
				  ?>
				
                    <div class="col-md-3">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-portfolio ttm-box-view-top-image">
                            <div class="ttm-box-view-content-inner">
                                <!-- featured-thumbnail -->
							  <?php
							  $piQry="select * from products_images where p_id_fk='".$pRow['p_id_pk']."' and pi_status='active' order by pi_id_pk asc limit 1";
							  $piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							  $piRow=mysqli_fetch_assoc($piSql);
							  ?>
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="<?php echo "./upload/".$piRow['pi_img']; ?>" alt="image"></a>
                                </div><!-- featured-thumbnail end-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="featured-iconbox ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="" data-rel="prettyPhoto" href="upload/<?php echo $piRow["pi_img"]; ?>"><i class="ti ti-search"></i></a>
										<?php /**/ ?>
                                        <a href="./product&id=<?php echo $pRow["p_id_pk"]."&".strtolower(str_replace(" ","-",$pRow["p_title"])); ?>" class="ttm_link"><i class="ti ti-link"></i></a>
                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div>
							<?php /**/ ?>
                            <div class="featured-content featured-content-portfolio text-center box-shadow2">
                                <div class="featured-title">
                                    <h5><a href="./product&id=<?php echo $pRow["p_id_pk"]."&".strtolower(str_replace(" ","-",$pRow["p_title"])); ?>"><?php echo $pRow["p_title"]; ?></a></h5>
                                </div>
                            </div>
							<?php /**/ ?>
                        </div><!-- featured-imagebox -->
                    </div>
				  <?php
				  $row++;
				  if($row==4)
				  {
				  ?>
				  </div>
				  <?php
				  $row=0;
				  }
			  }
			  ?>
            </div>
        </section>
        <!-- faq-section end -->
        
    </div><!--site-main end-->

