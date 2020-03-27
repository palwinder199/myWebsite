<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
<!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Products<small>Our Products</small></div>
            </div>
			
            <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
                  <form class="form-horizontal" data-parsley-validate="" novalidate="" enctype="multipart/form-data" method="post">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title">Products Overview</div>
                        </div>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
                        <div class="card-body">
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Overview</label>
                                 <div class="col-md-6"><textarea class="form-control" name="po_overview" required="required" rows="15" id="editor1"><?php echo GetSingleData('products_overview', 'po_id_pk', '1', 'po_overview'); ?></textarea></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                        </div>
                        <div class="card-footer">
							<button class="btn btn-info float-right" type="submit">Submit</button>
						</div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
         </div>
      </section>
	  