<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
	  <!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Gallery<small>Our Gallery</small></div>
            </div>
            <div class="container-fluid">
			   <!-- DATATABLE DEMO 2-->
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">Gallery 
					   <a href="./gallery-a" class="btn btn-labeled btn-success mb-2" style="float:right;color:#fff;"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</a> 
					 </div>
                  </div>
                  <div class="card-body">
                     <table class="table table-striped my-4 w-100" id="datatable2">
                        <thead>
                           <tr>
                              <th class="sort-numeric" data-priority="1">S.No.</th>
                              <th class="sort-numeric">Order</th>
                              <th class="sort-alpha">Img</th>
                              <th class="sort-alpha">Entry Date Time</th>
                              <th class="sort-alpha">Status</th>
                              <th class="sort-alpha">Action</th>
                           </tr>
                        </thead>
                        <tbody>
						<?php
						$sno=1;
						$pQry="SELECT * FROM gallery ORDER BY g_order asc";
						$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
						while($pRow=mysqli_fetch_assoc($pSql))
						{
						?>
                           <tr class="gradeX pid<?php echo $pRow["g_id_pk"]; ?>">
                              <td><?php echo $sno; ?></td>
                              <td><?php echo $pRow["g_order"]; ?></td>
                              <td>
									<a target="_blank" href="../upload/gallery/<?php echo $pRow["g_img"]; ?>"><img src="../upload/gallery/<?php echo $pRow["g_img"]; ?>" style="max-width:100px;" /></a>
							  </td>
                              <td><?php echo $pRow["g_entrydatetime"]; ?></td>
                              <td>
							    <div class="checkbox c-checkbox float-left">
								  <label><input type="checkbox" <?php if($pRow["g_status"]=='active'){ ?>checked=""<?php } ?> name="g_status" onclick="ChangeStatus('<?php echo $_SESSION["Token"]; ?>','gallery->g_id_pk-><?php echo $pRow['g_id_pk']; ?>->g_status')"><span class="fa fa-check"></span></label>
							    </div>
							  </td>
							  <td style="min-width:150px;">
							    <a class="btn btn-warning text-white" data-toggle="tooltip" title="Edit" href="./gallery-a&id=<?php echo $pRow['g_id_pk']; ?>"><i class="fa fa-edit"></i></a>
							    <a class="btn btn-danger text-white" data-toggle="tooltip" title="Delete" onclick="DeleteRow('<?php echo $_SESSION["Token"]; ?>','gallery->g_id_pk-><?php echo $pRow['g_id_pk']; ?>->null->null','.pid<?php echo $pRow["g_id_pk"]; ?>')"><i class="fa fa-times"></i></a>
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
	  