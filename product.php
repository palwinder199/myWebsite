
<?php
if(isset($_GET['id']) and $_GET['id']>0)
{
	$pQry="select * from products where p_status='active' and p_id_pk='".addslashes($_GET['id'])."' order by p_order asc";
	$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
	$pRow=mysqli_fetch_assoc($pSql);
}
else
{
	LoginRedirect('./');
}
?><!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading">
                                <h1 class="title"><?php echo $pRow["p_title"]; ?></h1>
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

        <!-- faq-section -->
        <section class="ttm-row single-project-section clearfix">
            <div class="container">
                <div class="row mt-60 res-991-mt-30">
                    <div class="col-md-4">
			    <?php
				$do=1;
				$piQry="select * from products_images where p_id_fk='".$pRow['p_id_pk']."' and pi_status='active' order by pi_id_pk asc limit 2";
				$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
				while($piRow=mysqli_fetch_assoc($piSql))
				{
				?>
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-portfolio ttm-box-view-top-image">
                            <div class="ttm-box-view-content-inner">
                                <!-- featured-thumbnail -->
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="<?php echo "./upload/".$piRow["pi_img"]; ?>" alt="image"></a>
                                </div><!-- featured-thumbnail end-->
                                <!-- ttm-box-view-overlay -->
                                <div class="ttm-box-view-overlay">
                                    <div class="featured-iconbox ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery<?php echo $do; ?>]" title="" data-rel="prettyPhoto" href="<?php echo "./upload/".$piRow["pi_img"]; ?>"><i class="ti ti-search"></i></a>
                                    </div>
                                </div><!-- ttm-box-view-overlay end-->
                            </div>
                        </div><!-- featured-imagebox -->
				<?php
				$do++;
				}
				?>
                    </div>
                    <div class="col-md-8">
						<div class="row res-991-mt-30 text-justify">
							<div class="col-lg-12">
								<h2><?php echo $pRow["p_title"]; ?></h2>
							</div>
							<div class="col-lg-12">
								<?php echo $pRow["p_short_desc"]; ?>
							</div>
							<div class="col-lg-12">
								<?php echo $pRow["p_full_desc"]; ?>
							</div>
							<div class="col-lg-12">
								<?php echo $pRow["p_features"]; ?>
							</div>
							<div class="col-lg-12">
							  <!-- Trigger the modal with a button -->
							  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Get Price/Quote</button>
							</div>
						</div>
					</div>
                </div>
				
                <div class="separator">
                    <div class="sep-line solid mt-30 mb-30"></div>
                </div>
            </div>
        </section>
        <!-- faq-section end -->
        
    </div><!--site-main end-->
