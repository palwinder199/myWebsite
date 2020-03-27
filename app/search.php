	  <!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Search<small>Search and filter results</small></div>
            </div>
            <div class="row">
               <div class="col-lg-12">
				  <form class="navbar-form" role="search" action="./search">
				  
					  <div class="form-group mb-4"><input class="form-control mb-2" name="q" value="<?php if(isset($q)){ echo $q; } ?>" type="text" placeholder="Search products, people, apps, etc.">
						 <div class="d-flex"><button class="btn btn-secondary" type="submit">Search</button>
							<?php /** / ?>
							<div class="ml-auto"><label class="c-checkbox"><input id="inlineCheckbox10" type="checkbox" value="option1"><span class="fa fa-check"></span> Products</label><label class="c-checkbox"><input id="inlineCheckbox20" type="checkbox" value="option2"><span class="fa fa-check"></span> People</label><label class="c-checkbox"><input id="inlineCheckbox30" type="checkbox" value="option3"><span class="fa fa-check"></span> Apps</label></div>
							<?php /**/ ?>
						 </div>
					  </div>
				  </form>
				  <!-- START card-->
                  <div class="card card-default">
                     <div class="card-header"><a class="float-right" href="#" data-tool="panel-refresh" data-toggle="tooltip" title="Refresh Card"><em class="fas fa-sync"></em></a>Search Results</div><!-- START table-responsive-->
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th class="wd-xxs" data-check-all="">
                                    <div class="checkbox c-checkbox" data-toggle="tooltip" data-title="Check All"><label class="m-0"><input type="checkbox"><span class="fa fa-check"></span></label></div>
                                 </th>
                                 <th>Description</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <div class="checkbox c-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span></label></div>
                                 </td>
                                 <td>
                                    <div class="media align-items-center"><a class="mr-3" href="#"><img class="img-fluid rounded thumb64" src="img/dummy.png" alt=""></a>
                                       <div class="media-body d-flex">
                                          <div>
                                             <h4 class="m-0">Product 1</h4><small class="text-muted">Category1, Category2</small>
                                             <p>Sed gravida auctor odio. Sed viverra rutrum hendrerit. Praesent dapibus justo dolor. Suspendisse rhoncus consectetur eros vehicula accumsan.</p>
                                          </div>
                                          <div class="ml-auto">
                                             <div class="btn btn-info btn-sm">View</div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="checkbox c-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span></label></div>
                                 </td>
                                 <td>
                                    <div class="media align-items-center"><a class="mr-3" href="#"><img class="img-fluid rounded thumb64" src="img/dummy.png" alt=""></a>
                                       <div class="media-body d-flex">
                                          <div>
                                             <h4 class="m-0">Product 2</h4><small class="text-muted">Category1, Category2</small>
                                             <p>Sed gravida auctor odio. Sed viverra rutrum hendrerit. Praesent dapibus justo dolor. Suspendisse rhoncus consectetur eros vehicula accumsan.</p>
                                          </div>
                                          <div class="ml-auto">
                                             <div class="btn btn-info btn-sm">View</div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="checkbox c-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span></label></div>
                                 </td>
                                 <td>
                                    <div class="media align-items-center"><a class="mr-3" href="#"><img class="img-fluid rounded thumb64" src="img/dummy.png" alt=""></a>
                                       <div class="media-body d-flex">
                                          <div>
                                             <h4 class="m-0">Product 3</h4><small class="text-muted">Category1, Category2</small>
                                             <p>Sed gravida auctor odio. Sed viverra rutrum hendrerit. Praesent dapibus justo dolor. Suspendisse rhoncus consectetur eros vehicula accumsan.</p>
                                          </div>
                                          <div class="ml-auto">
                                             <div class="btn btn-info btn-sm">View</div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="checkbox c-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span></label></div>
                                 </td>
                                 <td>
                                    <div class="media align-items-center"><a class="mr-3" href="#"><img class="img-fluid rounded thumb64" src="img/dummy.png" alt=""></a>
                                       <div class="media-body d-flex">
                                          <div>
                                             <h4 class="m-0">Product 4</h4><small class="text-muted">Category1, Category2</small>
                                             <p>Sed gravida auctor odio. Sed viverra rutrum hendrerit. Praesent dapibus justo dolor. Suspendisse rhoncus consectetur eros vehicula accumsan.</p>
                                          </div>
                                          <div class="ml-auto">
                                             <div class="btn btn-info btn-sm">View</div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="checkbox c-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span></label></div>
                                 </td>
                                 <td>
                                    <div class="media align-items-center"><a class="mr-3" href="#"><img class="img-fluid rounded thumb64" src="img/dummy.png" alt=""></a>
                                       <div class="media-body d-flex">
                                          <div>
                                             <h4 class="m-0">Product 5</h4><small class="text-muted">Category1, Category2</small>
                                             <p>Sed gravida auctor odio. Sed viverra rutrum hendrerit. Praesent dapibus justo dolor. Suspendisse rhoncus consectetur eros vehicula accumsan.</p>
                                          </div>
                                          <div class="ml-auto">
                                             <div class="btn btn-info btn-sm">View</div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div><!-- END table-responsive-->
                     <div class="card-footer">
                        <div class="d-flex"><button class="btn btn-sm btn-secondary">Clear</button>
                           <nav class="ml-auto">
                              <ul class="pagination pagination-sm">
                                 <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                                 <li class="page-item"><a class="page-link" href="#">»</a></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div><!-- END card-->
               </div>
			   <?php /** / ?>
               <div class="col-lg-3">
                  <h3 class="m-0 pb-3">Filters</h3>
                  <div class="form-group mb-4"><label class="col-form-label mb-2">by Text</label><br><select class="chosen-select form-control">
                        <optgroup label="NFC EAST">
                           <option>Dallas Cowboys</option>
                           <option>New York Giants</option>
                           <option>Philadelphia Eagles</option>
                           <option>Washington Redskins</option>
                        </optgroup>
                        <optgroup label="NFC NORTH">
                           <option>Chicago Bears</option>
                           <option>Detroit Lions</option>
                           <option>Green Bay Packers</option>
                           <option>Minnesota Vikings</option>
                        </optgroup>
                        <optgroup label="NFC SOUTH">
                           <option>Atlanta Falcons</option>
                           <option>Carolina Panthers</option>
                           <option>New Orleans Saints</option>
                           <option>Tampa Bay Buccaneers</option>
                        </optgroup>
                        <optgroup label="NFC WEST">
                           <option>Arizona Cardinals</option>
                           <option>St. Louis Rams</option>
                           <option>San Francisco 49ers</option>
                           <option>Seattle Seahawks</option>
                        </optgroup>
                        <optgroup label="AFC EAST">
                           <option>Buffalo Bills</option>
                           <option>Miami Dolphins</option>
                           <option>New England Patriots</option>
                           <option>New York Jets</option>
                        </optgroup>
                        <optgroup label="AFC NORTH">
                           <option>Baltimore Ravens</option>
                           <option>Cincinnati Bengals</option>
                           <option>Cleveland Browns</option>
                           <option>Pittsburgh Steelers</option>
                        </optgroup>
                        <optgroup label="AFC SOUTH">
                           <option>Houston Texans</option>
                           <option>Indianapolis Colts</option>
                           <option>Jacksonville Jaguars</option>
                           <option>Tennessee Titans</option>
                        </optgroup>
                        <optgroup label="AFC WEST">
                           <option>Denver Broncos</option>
                           <option>Kansas City Chiefs</option>
                           <option>Oakland Raiders</option>
                           <option>San Diego Chargers</option>
                        </optgroup>
                     </select></div>
                  <div class="form-group"><label class="col-form-label mb-2">by Date</label><br>
                     <div class="input-group date" id="datetimepicker"><input class="form-control" type="text"><span class="input-group-append input-group-addon"><span class="input-group-text fas fa-calendar-alt"></span></span></div>
                  </div>
                  <div class="form-group mb-4"><label class="col-form-label mb-2">by Range</label><br>
                     <div class="slider-fw"><input class="slider" id="sl2" data-ui-slider="" type="text" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,750]"></div>
                  </div><button class="btn btn-secondary btn-lg">Apply</button>
               </div>
			   <?php /**/ ?>
            </div>
         </div>
      </section>