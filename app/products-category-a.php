<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
<!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Products Category<small>Our Products Category</small></div>
            </div>
            <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
                  <form class="form-horizontal" data-parsley-validate="" novalidate="" enctype="multipart/form-data" method="post">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ ?>Edit<?php }else{ ?>Add<?php } ?> Products Category</div>
                        </div>
						<?php /*** / ?>
                        <div class="bg-gray-lighter px-3 py-2 my-3"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ ?>Edit<?php }else{ ?>Add<?php } ?></div>
						<?php /***/ ?>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
						<input type="hidden" name="pc_id_pk" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo $_REQUEST["id"]; }else{ echo '0'; } ?>">
                        <div class="card-body">
						
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Category Title</label>
                                 <div class="col-md-6">
									<input class="form-control" type="text" name="pc_title" required="required" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products_category', 'pc_id_pk', $_REQUEST["id"], 'pc_title'); } ?>">
								    <?php /** / ?>
									<textarea class="form-control note-editor" name="pc_data" required="required" rows="5"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products_category', 'pc_id_pk', $_REQUEST["id"], 'pc_data'); } ?></textarea>
								    <?php /**/ ?>
								 </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Order</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="pc_order" required="required" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products_category', 'pc_id_pk', $_REQUEST["id"], 'pc_order'); }else{ echo "1"; } ?>" data-parsley-type="digits"></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                        </div>
                        <div class="card-footer">
							<div class="checkbox c-checkbox float-left">
								<label><input type="checkbox" checked="" name="pc_status" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('products_category', 'pc_id_pk', $_REQUEST["id"], 'pc_status')=='active'){ echo "checked"; } ?>><span class="fa fa-check"></span> Active</label>
							</div>
							<button class="btn btn-info float-right" type="submit">Submit</button>
						</div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
         </div>
      </section>
	  