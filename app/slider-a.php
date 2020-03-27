<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
<!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Slider<small>Our Slider</small></div>
            </div>
            <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
                  <form class="form-horizontal" data-parsley-validate="" novalidate="" enctype="multipart/form-data" method="post">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ ?>Edit<?php }else{ ?>Add<?php } ?> Slider</div>
                        </div>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
						<input type="hidden" name="s_id_pk" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo $_REQUEST["id"]; }else{ echo '0'; } ?>">
                        <div class="card-body">
						   <fieldset>
							  <div class="form-group row"><label class="col-md-2 col-form-label">Image(s)</label>
							     <div class="col-md-6">
								     <input class="form-control filestyle" type="file" name="s_image[]" accept="image/*" multiple data-classbutton="btn btn-secondary" data-classinput="form-control inline" data-icon="&lt;span class='fa fa-upload mr-2'&gt;&lt;/span&gt;" <?php if(!isset($_REQUEST["id"])){ ?>required <?php } ?>>
								     <br>* To select multiple files, hold down the CTRL or SHIFT key while selecting.
								     <br>* Best W1280 X H412.
							     </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
							  </div>
						   </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Order</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="s_order" required="required" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('slider', 's_id_pk', $_REQUEST["id"], 's_order'); }else{ echo "1"; } ?>" data-parsley-type="digits"></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                        </div>
                        <div class="card-footer">
							<div class="checkbox c-checkbox float-left">
								<label><input type="checkbox" checked="" name="s_status" ><span class="fa fa-check"></span> Active</label>
							</div>
							<button class="btn btn-info float-right" type="submit">Submit</button>
						</div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
         </div>
      </section>
	  