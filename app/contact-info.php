<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
	  <!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Contact Info<small>Our Contact Info</small></div>
            </div>
            <div class="container-fluid">
			   <!-- DATATABLE DEMO 2-->
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">Contact Info 
					    <?php /***/ ?>
						<a href="./contact-info-a" class="btn btn-labeled btn-success mb-2" style="float:right;color:#fff;"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</a>
					    <?php /***/ ?>
					 </div>
                  </div>
                  <div class="card-body">
                     <table class="table table-striped my-4 w-100" id="datatable2">
                        <thead>
                           <tr>
                              <th class="sort-numeric" data-priority="1">S.No.</th>
                              <th class="sort-alpha">Order</th>
                              <th class="sort-alpha">Type</th>
                              <th class="sort-alpha">Content</th>
                              <th class="sort-alpha">Entry Date Time</th>
                              <th class="sort-alpha">Status</th>
                              <th class="sort-alpha">Action</th>
                           </tr>
                        </thead>
                        <tbody>
						<?php
						$sno=1;
						$pQry="SELECT * FROM contact_data ORDER BY cd_type, cd_order ASC";
						$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
						while($pRow=mysqli_fetch_assoc($pSql))
						{
						?>
                           <tr class="gradeX pid<?php echo $pRow["cd_id_pk"]; ?>">
                              <td><?php echo $sno; ?></td>
                              <td><?php echo $pRow["cd_order"]; ?></td>
                              <td><?php echo $pRow["cd_type"]; ?></td>
                              <td><?php echo $pRow["cd_data"]; ?></td>
                              <td><?php echo $pRow["cd_entrydatetime"]; ?></td>
                              <td>
							    <div class="checkbox c-checkbox float-left">
								  <label><input type="checkbox" <?php if($pRow["cd_status"]=='active'){ ?>checked=""<?php } ?> name="cd_status" onclick="ChangeStatus('<?php echo $_SESSION["Token"]; ?>','contact_data->cd_id_pk-><?php echo $pRow['cd_id_pk']; ?>->cd_status')"><span class="fa fa-check"></span></label>
							    </div>
							  </td>
							  <td style="min-width:150px;">
							    <a class="btn btn-warning text-white" data-toggle="tooltip" title="Edit" href="./contact-info-a&id=<?php echo $pRow['cd_id_pk']; ?>"><i class="fa fa-edit"></i></a>
							    <a class="btn btn-danger text-white" data-toggle="tooltip" title="Delete" onclick="DeleteRow('<?php echo $_SESSION["Token"]; ?>','contact_data->cd_id_pk-><?php echo $pRow['cd_id_pk']; ?>->null->null','.pid<?php echo $pRow["cd_id_pk"]; ?>')"><i class="fa fa-times"></i></a>
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
	  