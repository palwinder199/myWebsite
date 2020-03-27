<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
<!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Establishment<small>Our Establishment</small></div>
            </div>
            <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
                  <form class="form-horizontal" data-parsley-validate="" novalidate="" enctype="multipart/form-data" method="post">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title"> Establishment</div>
                        </div>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
						<input type="hidden" name="e_id_pk" value="1">
						<?php
						$establishment_image=GetSingleData('establishment', 'e_id_pk', 1, 'e_image'); 
						if(file_exists("../upload/".$establishment_image) and $establishment_image!='')
						{
						?>
                        <div class="card-body">
						   
						   <fieldset>
							  <div class="form-group row"><label class="col-md-2 col-form-label">Existing Image</label>
							     <div class="col-md-10">
								 
								   <img src="<?php echo "../upload/".$establishment_image; ?>" style="width:100%">
							     </div><?php /** / ?>
                                 <div class="col-md-4"><code>required</code></div><?php /**/ ?>
							  </div>
						   </fieldset>
                        </div>
						<?php
						}
						?>
                        <div class="card-body">
						   <fieldset>
							  <div class="form-group row"><label class="col-md-2 col-form-label">Image</label>
							     <div class="col-md-6">
								     <input class="form-control filestyle" type="file" name="e_image[]" accept="image/*" data-classbutton="btn btn-secondary" data-classinput="form-control inline" data-icon="&lt;span class='fa fa-upload mr-2'&gt;&lt;/span&gt;" required>
								     <br>* Best W1100 X H80.
							     </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
							  </div>
						   </fieldset>
                        </div>
                        <div class="card-footer">
							<?php /** / ?>
							<div class="checkbox c-checkbox float-left">
								<label><input type="checkbox" checked="" name="e_status" ><span class="fa fa-check"></span> Active</label>
							</div>
							<?php /**/ ?>
							<button class="btn btn-info float-right" type="submit">Submit</button>
						</div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
         </div>
      </section>
	  