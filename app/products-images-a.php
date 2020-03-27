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
                           <div class="card-title">Add Image(s)</div>
                        </div>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
						<input type="hidden" name="p_id_pk" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo $_REQUEST["id"]; }else{ echo '0'; } ?>">
                        <div class="card-body">
						   <fieldset>
							  <div class="form-group row"><label class="col-md-2 col-form-label">Image(s)</label>
							     <div class="col-md-6">
								     <input class="form-control filestyle" type="file" name="pi_images[]" accept="image/*" multiple data-classbutton="btn btn-secondary" data-classinput="form-control inline" data-icon="&lt;span class='fa fa-upload mr-2'&gt;&lt;/span&gt;" <?php if(!isset($_REQUEST["id"])){ ?>required <?php } ?>>
								     <br>* To select multiple files, hold down the CTRL or SHIFT key while selecting.
								     <br>* Best W500 X H490.
							     </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
							  </div>
						   </fieldset>
                        </div>
                        <div class="card-footer">
							<div class="checkbox c-checkbox float-left">
								<label><input type="checkbox" checked="" name="pi_status" ><span class="fa fa-check"></span> Active</label>
							</div>
							<button class="btn btn-info float-right" type="submit">Submit</button>
						</div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
         </div>
      </section>
	  