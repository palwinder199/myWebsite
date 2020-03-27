<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
if(!isset($_REQUEST['id']))
{
	LoginRedirect("./");
}
?>
<!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>
				   <?php 
				   if(isset($_REQUEST['id']) and $_REQUEST['id']=='2')
				   {
					   echo " Pocket ";
				   }
				   ?>
				   Resume
				   <?php 
				   if(isset($_REQUEST['id']) and $_REQUEST['id']=='1')
				   {
					   echo " Price ";
				   }
				   ?>
				   <small>
				   My Resume
				   </small>
			   </div>
            </div>
            <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
                  <form class="form-horizontal" data-parsley-validate="" novalidate="" enctype="multipart/form-data" method="post">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title"> Resume</div>
                        </div>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
						<input type="hidden" name="resume_id_pk" value="<?php echo $_REQUEST['id']; ?>">
						<?php
						$resume_file=GetSingleData('resume', 'resume_id_pk', $_REQUEST["id"], 'resume_file'); 
						if(file_exists("../resume/".$resume_file) and $resume_file!='')
						{
						?>
                        <div class="card-body">
						   
						   <fieldset>
							  <div class="form-group row"><label class="col-md-2 col-form-label">Existing File</label>
							     <div class="col-md-6">
								 
								   <a target="_blank" href="<?php echo "../resume/".$resume_file; ?>"><?php echo $resume_file; ?></a>
							     </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
							  </div>
						   </fieldset>
                        </div>
						<?php
						}
						?>
                        <div class="card-body">
						   <fieldset>
							  <div class="form-group row"><label class="col-md-2 col-form-label">File(PDF)</label>
							     <div class="col-md-6">
								     <input class="form-control filestyle" type="file" name="resume_file[]" accept=".pdf" data-classbutton="btn btn-secondary" data-classinput="form-control inline" data-icon="&lt;span class='fa fa-upload mr-2'&gt;&lt;/span&gt;" required>
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
	  