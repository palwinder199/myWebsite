<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
	  <!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Companies Logo<small>Our Companies Logo</small></div>
            </div>
            <div class="container-fluid">
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">Companies Logo <a href="./companies-logo-a" class="btn btn-labeled btn-success mb-2" style="float:right;color:#fff;"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</a></div>
                  </div>
                  <div class="card-body">
                     <table class="table table-striped my-4 w-100" id="datatable2">
                        <thead>
                           <tr>
                              <th class="sort-numeric" data-priority="1">S.No.</th>
                              <th class="sort-numeric" data-priority="2">Order</th>
                              <th class="sort-alpha">Companies Logo</th>
                              <th class="sort-alpha">Entry Date Time</th>
                              <th class="sort-alpha">Status</th>
                              <th class="sort-alpha">Action</th>
                           </tr>
                        </thead>
                        <tbody>
						<?php
						$sno=1;
						$pQry="SELECT * FROM companies_logo ORDER BY cl_order asc";
						$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
						while($pRow=mysqli_fetch_assoc($pSql))
						{
						?>
                           <tr class="gradeX pid<?php echo $pRow["cl_id_pk"]; ?>">
                              <td><?php echo $sno; ?></td>
                              <td><?php echo $pRow["cl_order"]; ?></td>
                              <td><img style="width:200px;" src="../upload/<?php echo $pRow["cl_image"]; ?>" /></td>
                              <td><?php echo $pRow["cl_entrydatetime"]; ?></td>
                              <td>
							    <div class="checkbox c-checkbox float-left">
								  <label><input type="checkbox" <?php if($pRow["cl_status"]=='active'){ ?>checked=""<?php } ?> name="cl_status" onclick="ChangeStatus('<?php echo $_SESSION["Token"]; ?>','companies_logo->cl_id_pk-><?php echo $pRow['cl_id_pk']; ?>->cl_status')"><span class="fa fa-check"></span></label>
							    </div>
							  </td>
							  <td style="min-width:150px;">
							    <a class="btn btn-warning text-white" data-toggle="tooltip" title="Edit" href="./companies-logo-a&id=<?php echo $pRow['cl_id_pk']; ?>"><i class="fa fa-edit"></i></a>
							    <a class="btn btn-danger text-white" data-toggle="tooltip" title="Delete" onclick="DeleteRow('<?php echo $_SESSION["Token"]; ?>','companies_logo->cl_id_pk-><?php echo $pRow['cl_id_pk']; ?>-><?php echo $pRow["cl_image"]; ?>->../upload/<?php echo $pRow["cl_image"]; ?>','.pid<?php echo $pRow["cl_id_pk"]; ?>')"><i class="fa fa-times"></i></a>
							  </td>

                           </tr>
						<?php
						$sno++;
						}
						?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  