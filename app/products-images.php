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
            <div class="container-fluid">
			   <!-- DATATABLE DEMO 2-->
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">Products <a href="./products-images-a&id=<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id']; } ?>" class="btn btn-labeled btn-success mb-2" style="float:right;color:#fff;"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</a></div>
					 <?php /***** / ?>
                     <div class="text-sm">When displaying data in a DataTable, it can often be useful to your end users for them to have the ability to obtain the data from the DataTable, extracting it into a file for them to use locally. This can be done with either HTML5 based buttons or Flash buttons.</div>
					 <?php /*****/ ?>
                  </div>
                  <div class="card-body">
                     <table class="table table-striped my-4 w-100" id="datatable2">
                        <thead>
                           <tr>
                              <th class="sort-numeric" data-priority="1">S.No.</th>
                              <th class="sort-alpha">Image</th>
                              <th class="sort-alpha">Entry Date Time</th>
                              <th class="sort-alpha">Status</th>
                              <th class="sort-alpha">Action</th>
                           </tr>
                        </thead>
                        <tbody>
						<?php
						$sno=1;
						$concat="";
						if(isset($_REQUEST['id']) and $_REQUEST['id']>0)
						{
							$concat=" WHERE p_id_fk='".addslashes($_REQUEST['id'])."'";
						}
						$piQry="SELECT * FROM products_images ".$concat." ORDER BY pi_id_pk asc";
						$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
						while($piRow=mysqli_fetch_assoc($piSql))
						{
							/*****/
						?>
                           <tr class="gradeX pid<?php echo $piRow["pi_id_pk"]; ?>">
                              <td><?php echo $sno; ?></td>
                              <td>
								  <a target="_blank" href="../upload/<?php echo $piRow["pi_img"]; ?>"><img src="../upload/<?php echo $piRow["pi_img"]; ?>" style="max-width:100px;" /></a>
							  </td>
                              <td><?php echo $piRow["pi_entrydatetime"]; ?></td>
                              <td>
							    <div class="checkbox c-checkbox float-left">
								  <label><input type="checkbox" <?php if($piRow["pi_status"]=='active'){ ?>checked=""<?php } ?> name="pi_status" onclick="ChangeStatus('<?php echo $_SESSION["Token"]; ?>','products_images->pi_id_pk-><?php echo $piRow['pi_id_pk']; ?>->pi_status')"><span class="fa fa-check"></span></label>
							    </div>
							  </td>
							  <td style="min-width:150px;">
							    <a class="btn btn-danger text-white" data-toggle="tooltip" title="Delete" onclick="DeleteRow('<?php echo $_SESSION["Token"]; ?>','products_images->pi_id_pk-><?php echo $piRow['pi_id_pk']; ?>->null->null','.pid<?php echo $piRow["pi_id_pk"]; ?>')"><i class="fa fa-times"></i></a>
							  </td>

                           </tr>
						<?php
						$sno++;
							/*****/
						}
						?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  