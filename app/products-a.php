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
			<?php /************** / ?>
			<!-- START row-->
            <div class="row">
               <div class="col-xl-6">
                  <form method="post" action="#" data-parsley-validate="" novalidate="">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title">Form Register</div>
                        </div>
                        <div class="card-body">
                           <div class="form-group"><label class="col-form-label">Email Address *</label><input class="form-control" type="text" name="email" required></div>
                           <div class="form-group"><label class="col-form-label">Password *</label><input class="form-control" id="id-password" type="password" name="password" required></div>
                           <div class="form-group"><label class="col-form-label">Confirm Password *</label><input class="form-control" type="password" name="confirmPassword" required data-parsley-equalto="#id-password"></div>
                           <div class="required">* Required fields</div>
                        </div>
                        <div class="card-footer">
                           <div class="clearfix">
                              <div class="float-left">
                                 <div class="checkbox c-checkbox"><label><input type="checkbox" name="agreements" required data-parsley-error-message="Please read and agree the terms"><span class="fa fa-check"></span> I agree with the<a class="ml-2" href="#">terms</a></label></div>
                              </div>
                              <div class="float-right"><button class="btn btn-primary" type="submit">Register</button></div>
                           </div>
                        </div>
                     </div><!-- END card-->
                  </form>
               </div>
               <div class="col-xl-6">
                  <form method="post" data-parsley-validate="" novalidate="">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title">Form Login</div>
                        </div>
                        <div class="card-body">
                           <div class="form-group"><label class="col-form-label">Email Address *</label><input class="form-control" type="text" name="email" required></div>
                           <div class="form-group"><label class="col-form-label">Password *</label><input class="form-control" type="password" name="password" required></div>
                           <div class="required">* Required fields</div>
                        </div>
                        <div class="card-footer"><button class="btn btn-primary" type="submit">Login</button></div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
			<?php /**************/ ?>
            <!-- START row-->
            <div class="row">
               <div class="col-lg-12">
                  <form class="form-horizontal" data-parsley-validate="" novalidate="" enctype="multipart/form-data" method="post">
                     <!-- START card-->
                     <div class="card card-default">
                        <div class="card-header">
                           <div class="card-title"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ ?>Edit<?php }else{ ?>Add<?php } ?> Product</div>
                        </div>
						<?php /*** / ?>
                        <div class="bg-gray-lighter px-3 py-2 my-3"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ ?>Edit<?php }else{ ?>Add<?php } ?></div>
						<?php /***/ ?>
						<input type="hidden" name="token" value="<?php echo $_SESSION["Token"]; ?>">
						<input type="hidden" name="p_id_pk" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo $_REQUEST["id"]; }else{ echo '0'; } ?>">
                        <div class="card-body">
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Category(If any)</label>
                                 <div class="col-md-6">
								   <select class="form-control" name="pc_id_fk" required="required">
								     <option value="">Please Select</option>
								     <option value="0" <?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('products', 'p_id_pk', $_REQUEST["id"], 'pc_id_fk')=="0"){ echo "selected"; } ?>>No Category</option>
									 <?php
									 $pcQry="SELECT * FROM products_category ORDER BY pc_id_pk ASC";
									 $pcSql=mysqli_query($con, $pcQry) or die(mysqli_error($con));
									 while($pcRow=mysqli_fetch_assoc($pcSql))
									 {
									 ?>
								     <option value="<?php echo $pcRow["pc_id_pk"]; ?>"<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0 and GetSingleData('products', 'p_id_pk', $_REQUEST["id"], 'pc_id_fk')==$pcRow["pc_id_pk"]){ echo "selected"; } ?>><?php echo $pcRow["pc_title"]; ?></option>
									 <?php
									 }
									 ?>
								   </select>
								 </div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Name</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="p_title" required="required" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products', 'p_id_pk', $_REQUEST["id"], 'p_title'); } ?>"></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
						   <?php /***** / ?>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Price(Rs.)</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="p_price" required="required" data-parsley-type="number"></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /** / ?></div>
                              </div>
                           </fieldset>
						   <?php /*****/ ?>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Short Description</label>
                                 <div class="col-md-6"><textarea class="form-control note-editor" name="p_short_desc" required="required" rows="5"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products', 'p_id_pk', $_REQUEST["id"], 'p_short_desc'); } ?></textarea></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Full Description</label>
                                 <div class="col-md-6"><textarea class="form-control" name="p_full_desc" required="required" rows="15" id="editor1"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products', 'p_id_pk', $_REQUEST["id"], 'p_full_desc'); } ?></textarea></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
						   <?php /************************** / ?>
						   <fieldset>
							<div class="form-group row"><label class="col-md-2 col-form-label">Simple wysiwyg</label>
							   <div class="col-md-6">
								  <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
									 <div class="btn-group dropdown"><a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" title="Font"><em class="fa fa-font"></em></a>
										<div class="dropdown-menu"><a class="dropdown-item" href="javacript:void" data-edit="fontName Arial" style="font-family:'Arial'">Arial</a><a class="dropdown-item" href="javacript:void" data-edit="fontName Sans" style="font-family:'Sans'">Sans</a><a class="dropdown-item" href="javacript:void" data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></div>
									 </div>
									 <div class="btn-group dropdown"><a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" title="Font Size"><em class="fa fa-text-height"></em>&nbsp;</a>
										<div class="dropdown-menu"><a class="dropdown-item" href="javacript:void" data-edit="fontSize 5" style="font-size:24px">Huge</a><a class="dropdown-item" href="javacript:void" data-edit="fontSize 3" style="font-size:18px">Normal</a><a class="dropdown-item" href="javacript:void" data-edit="fontSize 1" style="font-size:14px">Small</a></div>
									 </div>
									 <div class="btn-group"><a class="btn btn-secondary" data-edit="bold" data-toggle="tooltip" title="Bold (Ctrl/Cmd+B)"><em class="fa fa-bold"></em></a><a class="btn btn-secondary" data-edit="italic" data-toggle="tooltip" title="Italic (Ctrl/Cmd+I)"><em class="fa fa-italic"></em></a><a class="btn btn-secondary" data-edit="strikethrough" data-toggle="tooltip" title="Strikethrough"><em class="fa fa-strikethrough"></em></a><a class="btn btn-secondary" data-edit="underline" data-toggle="tooltip" title="Underline (Ctrl/Cmd+U)"><em class="fa fa-underline"></em></a></div>
									 <div class="btn-group"><a class="btn btn-secondary" data-edit="insertunorderedlist" data-toggle="tooltip" title="Bullet list"><em class="fa fa-list-ul"></em></a><a class="btn btn-secondary" data-edit="insertorderedlist" data-toggle="tooltip" title="Number list"><em class="fa fa-list-ol"></em></a><a class="btn btn-secondary" data-edit="outdent" data-toggle="tooltip" title="Reduce indent (Shift+Tab)"><em class="fas fa-outdent"></em></a><a class="btn btn-secondary" data-edit="indent" data-toggle="tooltip" title="Indent (Tab)"><em class="fa fa-indent"></em></a></div>
									 <div class="btn-group"><a class="btn btn-secondary" data-edit="justifyleft" data-toggle="tooltip" title="Align Left (Ctrl/Cmd+L)"><em class="fa fa-align-left"></em></a><a class="btn btn-secondary" data-edit="justifycenter" data-toggle="tooltip" title="Center (Ctrl/Cmd+E)"><em class="fa fa-align-center"></em></a><a class="btn btn-secondary" data-edit="justifyright" data-toggle="tooltip" title="Align Right (Ctrl/Cmd+R)"><em class="fa fa-align-right"></em></a><a class="btn btn-secondary" data-edit="justifyfull" data-toggle="tooltip" title="Justify (Ctrl/Cmd+J)"><em class="fa fa-align-justify"></em></a></div>
									 <div class="btn-group dropdown"><a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><em class="fa fa-link"></em></a>
										<div class="dropdown-menu">
										   <div class="input-group"><input class="form-control form-control-sm" id="LinkInput" placeholder="URL" type="text" data-edit="createLink">
											  <div class="input-group-btn"><button class="btn btn-sm btn-secondary" type="button">Add</button></div>
										   </div>
										</div><a class="btn btn-secondary" data-edit="unlink" data-toggle="tooltip" title="Remove Hyperlink"><em class="fa fa-cut"></em></a>
									 </div>
									 <div class="btn-group"><a class="btn btn-secondary" id="pictureBtn" data-toggle="tooltip" title="Insert picture (or just drag &amp; drop)"><em class="far fa-image"></em></a><input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px"></div>
									 <div class="btn-group ml-auto"><a class="btn btn-secondary" data-edit="undo" data-toggle="tooltip" title="Undo (Ctrl/Cmd+Z)"><em class="fa fa-undo"></em></a><a class="btn btn-secondary" data-edit="redo" data-toggle="tooltip" title="Redo (Ctrl/Cmd+Y)"><em class="fas fa-redo"></em></a></div>
								  </div>
								  <div class="form-control wysiwyg mt-3" style="overflow:scroll; height:250px;max-height:250px">Type something ...</div>
							   </div>
							   <div class="col-md-4"></div>
							</div>
						   </fieldset>
						   <?php /**************************/ ?>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Features</label>
                                 <div class="col-md-6"><textarea class="form-control note-editor" name="p_features" required="required" rows="15" id="editor2"><?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products', 'p_id_pk', $_REQUEST["id"], 'p_features'); } ?></textarea></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Order</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="p_order" required="required" data-parsley-type="digits" value="<?php if(isset($_REQUEST["id"]) and $_REQUEST["id"]>0){ echo GetSingleData('products', 'p_id_pk', $_REQUEST["id"], 'p_order'); }else{ echo "1"; } ?>"></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
						   <?php 
						   if(!isset($_REQUEST["id"]))
						   {
						   ?>
						 <fieldset>
							<div class="form-group row"><label class="col-md-2 col-form-label">Image(s)</label>
							   <div class="col-md-6">
								   <input class="form-control filestyle" type="file" name="pi_img[]" accept="image/*" multiple data-classbutton="btn btn-secondary" data-classinput="form-control inline" data-icon="&lt;span class='fa fa-upload mr-2'&gt;&lt;/span&gt;">
								   <br>* To select multiple files, hold down the CTRL or SHIFT key while selecting.
								   <br>* Best W500 X H490.
							   </div>
                               <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
							</div>
						 </fieldset>
						 <?php 
						   }
						 if(isset($_GET['seo']))
						 {
						 ?>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">SEO Title</label>
                                 <div class="col-md-6"><textarea class="form-control" name="p_seo_title" required="required" rows="5"></textarea></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">SEO Description</label>
                                 <div class="col-md-6"><textarea class="form-control" name="p_seo_desc" required="required" rows="5"></textarea></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">SEO Keywords</label>
                                 <div class="col-md-6"><textarea class="form-control" name="p_seo_keywords" required="required" rows="5"></textarea></div>
                                 <div class="col-md-4"><?php /** / ?><code>required</code><?php /**/ ?></div>
                              </div>
                           </fieldset>
						 <?php 
						 }
						 ?>
						   <?php /**** / ?>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Email</label>
                                 <div class="col-md-6"><input class="form-control" type="email" name="email" data-parsley-type="email"></div>
                                 <div class="col-md-4"><code>data-parsley-type="email"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Number</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="number" data-parsley-type="number"></div>
                                 <div class="col-md-4"><code>data-parsley-type="number"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Integer</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="integer" data-parsley-type="integer"></div>
                                 <div class="col-md-4"><code>data-parsley-type="integer"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Digits</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="digits" data-parsley-type="digits"></div>
                                 <div class="col-md-4"><code>data-parsley-type="digits"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Alphanum</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="alphanum" data-parsley-type="alphanum"></div>
                                 <div class="col-md-4"><code>data-parsley-type="alphanum"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Url</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="url" data-parsley-type="url"></div>
                                 <div class="col-md-4"><code>data-parsley-type="url"</code></div>
                              </div>
                           </fieldset>
                           <fieldset class="m-0">
                              <div class="form-group row"><label class="col-md-2 col-form-label">Equal to</label>
                                 <div class="col-md-3"><input class="form-control" id="id-source" type="text" placeholder="#id-source"></div>
                                 <div class="col-md-3"><input class="form-control" type="text" data-parsley-equalto="#id-source"></div>
                                 <div class="col-md-4"><code>data-parsley-equalto='#id-source'</code></div>
                              </div>
                           </fieldset>
                        </div>
                        <div class="bg-gray-lighter px-3 py-2 mb-3">Range validation</div>
                        <div class="card-body">
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Minlength</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="minlength" data-parsley-minlength="6"></div>
                                 <div class="col-md-4"><code>data-parsley-minlength="6"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Maxlength</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="maxlength" data-parsley-maxlength="10"></div>
                                 <div class="col-md-4"><code>data-parsley-maxlength="10"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Length</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="length" data-parsley-length="[6, 10]"></div>
                                 <div class="col-md-4"><code>data-parsley-length="[6, 10]"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Min</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="min" data-parsley-min="6"></div>
                                 <div class="col-md-4"><code>data-parsley-min="6"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Max</label>
                                 <div class="col-md-6"><input class="form-control" type="text" name="max" data-parsley-max="6"></div>
                                 <div class="col-md-4"><code>data-parsley-max="6"</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Min words</label>
                                 <div class="col-md-6"><input class="form-control" type="text" data-minwords="6"></div>
                                 <div class="col-md-4"><code>data-minwords='6'</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Max words</label>
                                 <div class="col-md-6"><input class="form-control" type="text" data-maxwords="6"></div>
                                 <div class="col-md-4"><code>data-maxwords='6'</code></div>
                              </div>
                           </fieldset>
                           <fieldset>
                              <div class="form-group row"><label class="col-md-2 col-form-label">Range of words</label>
                                 <div class="col-md-6"><input class="form-control" type="text" data-rangewords="[6,10]"></div>
                                 <div class="col-md-4"><code>data-rangewords='[6,10]'</code></div>
                              </div>
                           </fieldset>
						   <?php /****/ ?>
                        </div>
                        <div class="card-footer">
							<div class="checkbox c-checkbox float-left">
								<label><input type="checkbox" checked="" name="p_status" ><span class="fa fa-check"></span> Active</label>
							</div>
							<button class="btn btn-info float-right" type="submit">Submit</button>
						</div>
                     </div><!-- END card-->
                  </form>
               </div>
            </div><!-- END row-->
         </div>
      </section>
	  