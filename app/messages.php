<?php
$_SESSION["Token"]=randomString(40);
CheckLogin('./');
?>
	  <!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Messages<small>Our Messages</small></div>
            </div>
            <div class="container-fluid">
			   <!-- DATATABLE DEMO 2-->
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">Messages 
					    <?php /*** / ?>
						<a href="./form_query-a" class="btn btn-labeled btn-success mb-2" style="float:right;color:#fff;"><span class="btn-label"><i class="fa fa-plus"></i></span>Add</a>
					    <?php /***/ ?>
					 </div>
                  </div>
                  <div class="card-body">
                     <table class="table table-striped my-4 w-100" id="datatable2">
                        <thead>
                           <tr>
                              <th class="sort-numeric" data-priority="1">S.No.</th>
                              <th class="sort-alpha">Name</th>
                              <th class="sort-alpha">Phone</th>
                              <th class="sort-alpha">Email</th>
                              <th class="sort-alpha">Message</th>
                              <th class="sort-alpha">Url</th>
                              <th class="sort-alpha">Entry Date Time</th>
                              <th class="sort-alpha">Status</th>
                              <th class="sort-alpha">Action</th>
                           </tr>
                        </thead>
                        <tbody>
						<?php
						$sno=1;
						$pQry="SELECT * FROM form_query ORDER BY fq_id_pk desc";
						$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
						while($pRow=mysqli_fetch_assoc($pSql))
						{
						?>
                           <tr class="gradeX pid<?php echo $pRow["fq_id_pk"]; ?>">
                              <td><?php echo $sno; ?></td>
                              <td><?php echo $pRow["fq_name"]; ?></td>
                              <td><?php echo $pRow["fq_phone"]; ?></td>
                              <td><?php echo $pRow["fq_email"]; ?></td>
                              <td><?php echo $pRow["fq_message"]; ?></td>
                              <td><a href="<?php echo $pRow["fq_query_from_url"]; ?>" target="_blank" ><?php echo $pRow["fq_query_from_url"]; ?></td>
                              <td><?php echo $pRow["fq_entrydatetime"]; ?></td>
                              <td>
							    <div class="checkbox c-checkbox float-left">
								  <label><input type="checkbox" <?php if($pRow["fq_status"]=='active'){ ?>checked=""<?php } ?> name="fq_status" onclick="ChangeStatus('<?php echo $_SESSION["Token"]; ?>','form_query->fq_id_pk-><?php echo $pRow['fq_id_pk']; ?>->fq_status')"><span class="fa fa-check"></span></label>
							    </div>
							  </td>
							  <td style="min-width:150px;">
							    <a class="btn btn-danger text-white" data-toggle="tooltip" title="Delete" onclick="DeleteRow('<?php echo $_SESSION["Token"]; ?>','form_query->fq_id_pk-><?php echo $pRow['fq_id_pk']; ?>->null->null','.pid<?php echo $pRow["fq_id_pk"]; ?>')"><i class="fa fa-times"></i></a>
							  </td>

                           </tr>
						<?php
						$sno++;
						}
						?>
						   <?php /**** / ?>
                           <tr class="gradeC">
                              <td>Trident</td>
                              <td>Internet Explorer 5.0</td>
                              <td>Win 95+</td>
                              <td>5</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>Internet Explorer 5.5</td>
                              <td>Win 95+</td>
                              <td>5.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>Internet Explorer 6</td>
                              <td>Win 98+</td>
                              <td>6</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>Internet Explorer 7</td>
                              <td>Win XP SP2+</td>
                              <td>7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>AOL browser (AOL desktop)</td>
                              <td>Win XP</td>
                              <td>6</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 1.0</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 1.5</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 2.0</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 3.0</td>
                              <td>Win 2k+ / OSX.3+</td>
                              <td>1.9</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Camino 1.0</td>
                              <td>OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Camino 1.5</td>
                              <td>OSX.3+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Netscape 7.2</td>
                              <td>Win 95+ / Mac OS 8.6-9.2</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Netscape Browser 8</td>
                              <td>Win 98SE+</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Netscape Navigator 9</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.0</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.1</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.2</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.2</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.3</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.3</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.4</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.4</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.5</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.6</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.6</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.7</td>
                              <td>Win 98+ / OSX.1+</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.8</td>
                              <td>Win 98+ / OSX.1+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Seamonkey 1.1</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Epiphany 2.20</td>
                              <td>Gnome</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 1.2</td>
                              <td>OSX.3</td>
                              <td>125.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 1.3</td>
                              <td>OSX.3</td>
                              <td>312.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 2.0</td>
                              <td>OSX.4+</td>
                              <td>419.3</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 3.0</td>
                              <td>OSX.4+</td>
                              <td>522.1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>OmniWeb 5.5</td>
                              <td>OSX.4+</td>
                              <td>420</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>iPod Touch / iPhone</td>
                              <td>iPod</td>
                              <td>420.1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>S60</td>
                              <td>S60</td>
                              <td>413</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 7.0</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 7.5</td>
                              <td>Win 95+ / OSX.2+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 8.0</td>
                              <td>Win 95+ / OSX.2+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 8.5</td>
                              <td>Win 95+ / OSX.2+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 9.0</td>
                              <td>Win 95+ / OSX.3+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 9.2</td>
                              <td>Win 88+ / OSX.3+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 9.5</td>
                              <td>Win 88+ / OSX.3+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera for Wii</td>
                              <td>Wii</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Nokia N800</td>
                              <td>N800</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Nintendo DS browser</td>
                              <td>Nintendo DS</td>
                              <td>8.5</td>
                              <td>C/A<sup>1</sup></td>
                           </tr>
                           <tr class="gradeC">
                              <td>KHTML</td>
                              <td>Konqureror 3.1</td>
                              <td>KDE 3.1</td>
                              <td>3.1</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>KHTML</td>
                              <td>Konqureror 3.3</td>
                              <td>KDE 3.3</td>
                              <td>3.3</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>KHTML</td>
                              <td>Konqureror 3.5</td>
                              <td>KDE 3.5</td>
                              <td>3.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Tasman</td>
                              <td>Internet Explorer 4.5</td>
                              <td>Mac OS 8-9</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Tasman</td>
                              <td>Internet Explorer 5.1</td>
                              <td>Mac OS 7.6-9</td>
                              <td>1</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Tasman</td>
                              <td>Internet Explorer 5.2</td>
                              <td>Mac OS 8-X</td>
                              <td>1</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Misc</td>
                              <td>NetFront 3.1</td>
                              <td>Embedded devices</td>
                              <td>-</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Misc</td>
                              <td>NetFront 3.4</td>
                              <td>Embedded devices</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Misc</td>
                              <td>Dillo 0.8</td>
                              <td>Embedded devices</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Misc</td>
                              <td>Links</td>
                              <td>Text only</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Misc</td>
                              <td>Lynx</td>
                              <td>Text only</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Misc</td>
                              <td>IE Mobile</td>
                              <td>Windows Mobile 6</td>
                              <td>-</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Misc</td>
                              <td>PSP browser</td>
                              <td>PSP</td>
                              <td>-</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeU">
                              <td>Other browsers</td>
                              <td>All others</td>
                              <td>-</td>
                              <td>-</td>
                              <td>U</td>
                           </tr>
						   <?php /****/ ?>
                        </tbody>
                     </table>
                  </div>
               </div>
			   <?php /*************************** / ?>
			   <!-- DATATABLE DEMO 3-->
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">Key Table</div>
                     <div class="text-sm">KeyTable allows you to use keyboard navigation on a DataTables enhanced table, like an Excel spreadsheet.</div>
                  </div>
                  <div class="card-body">
                     <table class="table table-striped my-4 w-100" id="datatable3">
                        <thead>
                           <tr>
                              <th data-priority="1">Engine</th>
                              <th>Browser</th>
                              <th>Platform</th>
                              <th class="sort-numeric">Engine version</th>
                              <th class="sort-alpha" data-priority="2">CSS grade</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="gradeX">
                              <td>Trident</td>
                              <td>Internet Explorer 4.0</td>
                              <td>Win 95+</td>
                              <td>4</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Trident</td>
                              <td>Internet Explorer 5.0</td>
                              <td>Win 95+</td>
                              <td>5</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>Internet Explorer 5.5</td>
                              <td>Win 95+</td>
                              <td>5.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>Internet Explorer 6</td>
                              <td>Win 98+</td>
                              <td>6</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>Internet Explorer 7</td>
                              <td>Win XP SP2+</td>
                              <td>7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Trident</td>
                              <td>AOL browser (AOL desktop)</td>
                              <td>Win XP</td>
                              <td>6</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 1.0</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 1.5</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 2.0</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Firefox 3.0</td>
                              <td>Win 2k+ / OSX.3+</td>
                              <td>1.9</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Camino 1.0</td>
                              <td>OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Camino 1.5</td>
                              <td>OSX.3+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Netscape 7.2</td>
                              <td>Win 95+ / Mac OS 8.6-9.2</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Netscape Browser 8</td>
                              <td>Win 98SE+</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Netscape Navigator 9</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.0</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.1</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.2</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.2</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.3</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.3</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.4</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.4</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.5</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.6</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>1.6</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.7</td>
                              <td>Win 98+ / OSX.1+</td>
                              <td>1.7</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Mozilla 1.8</td>
                              <td>Win 98+ / OSX.1+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Seamonkey 1.1</td>
                              <td>Win 98+ / OSX.2+</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Gecko</td>
                              <td>Epiphany 2.20</td>
                              <td>Gnome</td>
                              <td>1.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 1.2</td>
                              <td>OSX.3</td>
                              <td>125.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 1.3</td>
                              <td>OSX.3</td>
                              <td>312.8</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 2.0</td>
                              <td>OSX.4+</td>
                              <td>419.3</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>Safari 3.0</td>
                              <td>OSX.4+</td>
                              <td>522.1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>OmniWeb 5.5</td>
                              <td>OSX.4+</td>
                              <td>420</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>iPod Touch / iPhone</td>
                              <td>iPod</td>
                              <td>420.1</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Webkit</td>
                              <td>S60</td>
                              <td>S60</td>
                              <td>413</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 7.0</td>
                              <td>Win 95+ / OSX.1+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 7.5</td>
                              <td>Win 95+ / OSX.2+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 8.0</td>
                              <td>Win 95+ / OSX.2+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 8.5</td>
                              <td>Win 95+ / OSX.2+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 9.0</td>
                              <td>Win 95+ / OSX.3+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 9.2</td>
                              <td>Win 88+ / OSX.3+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera 9.5</td>
                              <td>Win 88+ / OSX.3+</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Opera for Wii</td>
                              <td>Wii</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Nokia N800</td>
                              <td>N800</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Presto</td>
                              <td>Nintendo DS browser</td>
                              <td>Nintendo DS</td>
                              <td>8.5</td>
                              <td>C/A<sup>1</sup></td>
                           </tr>
                           <tr class="gradeC">
                              <td>KHTML</td>
                              <td>Konqureror 3.1</td>
                              <td>KDE 3.1</td>
                              <td>3.1</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>KHTML</td>
                              <td>Konqureror 3.3</td>
                              <td>KDE 3.3</td>
                              <td>3.3</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeA">
                              <td>KHTML</td>
                              <td>Konqureror 3.5</td>
                              <td>KDE 3.5</td>
                              <td>3.5</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Tasman</td>
                              <td>Internet Explorer 4.5</td>
                              <td>Mac OS 8-9</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Tasman</td>
                              <td>Internet Explorer 5.1</td>
                              <td>Mac OS 7.6-9</td>
                              <td>1</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Tasman</td>
                              <td>Internet Explorer 5.2</td>
                              <td>Mac OS 8-X</td>
                              <td>1</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Misc</td>
                              <td>NetFront 3.1</td>
                              <td>Embedded devices</td>
                              <td>-</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeA">
                              <td>Misc</td>
                              <td>NetFront 3.4</td>
                              <td>Embedded devices</td>
                              <td>-</td>
                              <td>A</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Misc</td>
                              <td>Dillo 0.8</td>
                              <td>Embedded devices</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Misc</td>
                              <td>Links</td>
                              <td>Text only</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeX">
                              <td>Misc</td>
                              <td>Lynx</td>
                              <td>Text only</td>
                              <td>-</td>
                              <td>X</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Misc</td>
                              <td>IE Mobile</td>
                              <td>Windows Mobile 6</td>
                              <td>-</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeC">
                              <td>Misc</td>
                              <td>PSP browser</td>
                              <td>PSP</td>
                              <td>-</td>
                              <td>C</td>
                           </tr>
                           <tr class="gradeU">
                              <td>Other browsers</td>
                              <td>All others</td>
                              <td>-</td>
                              <td>-</td>
                              <td>U</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
			   <?php /***************************/ ?>
            </div>
         </div>
      </section>
	  