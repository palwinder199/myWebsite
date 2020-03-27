<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
<!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Contact Info<small>My Contact Info</small></div>
            </div>
            <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
                  <form class="form-horizontal" data-parsley-validate="" novalidate="" enctype="multipart/form-data" method="post">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ ?>Edit<?php }else{ ?>Add<?php } ?> Contact Info</div>
                        </div>
						<?php /*** / ?>
                        <div class="bg-gray-lighter px-3 py-2 my-3"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ ?>Edit<?php }else{ ?>Add<?php } ?></div>
						<?php /***/ ?>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
						<input type="hidden" name="cd_id_pk" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo $_REQUEST["id"]; }else{ echo '0'; } ?>">
                        <div class="card-body">
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Type</label>
                                 <div class="col-md-6">
								   <select class="form-control" name="cd_type" required="required">
								     <option value="">Please Select</option>
								     <option value="Address" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Address"){ echo "selected"; } ?>>Address</option>
								     <option value="Email" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Email"){ echo "selected"; } ?>>Email</option>
								     <option value="Embedded Map" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Embedded Map"){ echo "selected"; } ?>>Embedded Map</option>
								     <option value="Facebook" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Facebook"){ echo "selected"; } ?>>Facebook</option>
								     <option value="Person Name" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Person Name"){ echo "selected"; } ?>>Person Name</option>
								     <option value="Phone" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Phone"){ echo "selected"; } ?>>Phone</option>
								     <option value="Twitter" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Twitter"){ echo "selected"; } ?>>Twitter</option>
								     <option value="Github" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Github"){ echo "selected"; } ?>>Github</option>
								     <option value="Instagram" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Instagram"){ echo "selected"; } ?>>Instagram</option>
								     <option value="Linkedin" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Linkedin"){ echo "selected"; } ?>>Linkedin</option>
								     <option value="Flickr" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Flickr"){ echo "selected"; } ?>>Flickr</option>
								     <option value="Pinterest" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Pinterest"){ echo "selected"; } ?>>Pinterest</option>
								     <option value="Youtube" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_type')=="Youtube"){ echo "selected"; } ?>>Youtube</option>
								   </select>
								 </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Content</label>
                                 <div class="col-md-6">
									<textarea class="form-control" rows="2" name="cd_data" required="required"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_data'); } ?></textarea>
								    <?php /** / ?>
									<textarea class="form-control note-editor" name="cd_data" required="required" rows="5"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_data'); } ?></textarea>
								    <?php /**/ ?>
								 </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Order</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="cd_order" required="required" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_order'); }else{ echo "1"; } ?>" data-parsley-type="digits"></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                        </div>
                        <div class="card-footer">
							<div class="checkbox c-checkbox float-left">
								<label><input type="checkbox" checked="" name="cd_status" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('contact_data', 'cd_id_pk', $_REQUEST["id"], 'cd_status')=='active'){ echo "checked"; } ?>><span class="fa fa-check"></span> Active</label>
							</div>
							<button class="btn btn-info float-right" type="submit">Submit</button>
						</div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
         </div>
      </section>
	  