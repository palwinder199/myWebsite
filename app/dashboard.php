	  <?php /*** / ?>
	  <!-- offsidebar-->
      <aside class="offsidebar d-none">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div role="tabpanel">
               <!-- Nav tabs-->
               <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab"><em class="icon-equalizer fa-lg"></em></a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab"><em class="icon-user fa-lg"></em></a></li>
               </ul><!-- Tab panes-->
               <div class="tab-content">
                  <div class="tab-pane fade active show" id="app-settings" role="tabpanel">
                     <h3 class="text-center text-thin mt-4">Settings</h3>
                     <div class="p-2">
                        <h4 class="text-muted text-thin">Themes</h4>
                        <div class="row row-flush mb-2">
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-a.css"><input type="radio" name="setting-theme" checked="checked"><span class="icon-check"></span><span class="split"><span class="color bg-info"></span><span class="color bg-info-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-b.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-green"></span><span class="color bg-green-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-c.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-purple"></span><span class="color bg-purple-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-d.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-danger"></span><span class="color bg-danger-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                        </div>
                        <div class="row row-flush mb-2">
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-e.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-info-dark"></span><span class="color bg-info"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-f.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-green-dark"></span><span class="color bg-green"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-g.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-purple-dark"></span><span class="color bg-purple"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-h.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-danger-dark"></span><span class="color bg-danger"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                        </div>
                     </div>
                     <div class="p-2">
                        <h4 class="text-muted text-thin">Layout</h4>
                        <div class="clearfix">
                           <p class="float-left">Fixed</p>
                           <div class="float-right"><label class="switch"><input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Boxed</p>
                           <div class="float-right"><label class="switch"><input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">RTL</p>
                           <div class="float-right"><label class="switch"><input id="chk-rtl" type="checkbox"><span></span></label></div>
                        </div>
                     </div>
                     <div class="p-2">
                        <h4 class="text-muted text-thin">Aside</h4>
                        <div class="clearfix">
                           <p class="float-left">Collapsed</p>
                           <div class="float-right"><label class="switch"><input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Collapsed Text</p>
                           <div class="float-right"><label class="switch"><input id="chk-collapsed-text" type="checkbox" data-toggle-state="aside-collapsed-text"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Float</p>
                           <div class="float-right"><label class="switch"><input id="chk-float" type="checkbox" data-toggle-state="aside-float"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Hover</p>
                           <div class="float-right"><label class="switch"><input id="chk-hover" type="checkbox" data-toggle-state="aside-hover"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Show Scrollbar</p>
                           <div class="float-right"><label class="switch"><input id="chk-scroll" type="checkbox" data-toggle-state="show-scrollbar" data-target=".sidebar"><span></span></label></div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="app-chat" role="tabpanel">
                     <h3 class="text-center text-thin mt-4">Connections</h3>
                     <div class="list-group">
                        <!-- START list title-->
                        <div class="list-group-item border-0"><small class="text-muted">ONLINE</small></div><!-- END list title-->
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/05.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Juan Sims</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-success circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/06.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Maureen Jenkins</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-success circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/07.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Billie Dunn</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-danger circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/08.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Tomothy Roberts</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-warning circle-lg"></span></div>
                           </div>
                        </div><!-- START list title-->
                        <div class="list-group-item border-0"><small class="text-muted">OFFLINE</small></div><!-- END list title-->
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/09.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Lawrence Robinson</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-warning circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/10.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Tyrone Owens</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-warning circle-lg"></span></div>
                           </div>
                        </div>
                     </div>
                     <div class="px-3 py-4 text-center">
                        <!-- Optional link to list more users--><a class="btn btn-purple btn-sm" href="#" title="See more contacts"><strong>Load more..</strong></a></div><!-- Extra items-->
                     <div class="px-3 py-2">
                        <p><small class="text-muted">Tasks completion</small></p>
                        <div class="progress progress-xs m-0">
                           <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"><span class="sr-only">80% Complete</span></div>
                        </div>
                     </div>
                     <div class="px-3 py-2">
                        <p><small class="text-muted">Upload quota</small></p>
                        <div class="progress progress-xs m-0">
                           <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"><span class="sr-only">40% Complete</span></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav><!-- END Off Sidebar (right)-->
      </aside>
	  <?php /***/ ?>
	  <!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>Dashboard<small>Welcome</small></div>
			   <?php /** / ?>
			   <!-- START Language list-->
               <div class="ml-auto">
                  <div class="btn-group"><button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret" type="button" data-toggle="dropdown">English</button>
                     <div class="dropdown-menu dropdown-menu-right-forced animated fadeInUpShort" role="menu"><a class="dropdown-item" href="#" data-set-lang="en">English</a><a class="dropdown-item" href="#" data-set-lang="es">Spanish</a></div>
                  </div>
               </div>
			   <!-- END Language list-->
			   <?php /**/ ?>
            </div><!-- START cards box-->
			<?php /*** / ?>
            <div class="row">
               <div class="col-xl-6 col-md-6">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left"><em class="icon-cloud-upload fa-3x"></em></div>
                     <div class="col-8 py-3 bg-primary rounded-right">
                        <div class="h2 mt-0">1700</div>
                        <div class="text-uppercase">Uploads</div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-md-6">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-purple-dark justify-content-center rounded-left"><em class="icon-globe fa-3x"></em></div>
                     <div class="col-8 py-3 bg-purple rounded-right">
                        <div class="h2 mt-0">700<small>GB</small></div>
                        <div class="text-uppercase">Quota</div>
                     </div>
                  </div>
               </div>
            </div><!-- END cards box-->
			<?php /***/ ?>
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-12">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left"><em class="icon-bubbles fa-3x"></em></div>
                     <div class="col-8 py-3 bg-green rounded-right">
                        <div class="h2 mt-0">Welcome</div>
                        <div class="text-uppercase">Again</div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-12">
                  <!-- START date widget-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-green justify-content-center rounded-left">
                        <div class="text-center">
                           <!-- See formats: https://docs.angularjs.org/api/ng/filter/date-->
                           <div class="text-sm" data-now="" data-format="MMMM"></div><br>
                           <div class="h2 mt-0" data-now="" data-format="D"></div>
                        </div>
                     </div>
                     <div class="col-8 py-3 rounded-right">
                        <div class="text-uppercase" data-now="" data-format="dddd"></div><br>
                        <div class="h2 mt-0" data-now="" data-format="h:mm"></div>
                        <div class="text-muted text-sm" data-now="" data-format="a"></div>
                     </div>
                  </div><!-- END date widget-->
               </div>
            </div>
			<?php /***/ ?>
            <div class="row">
               <!-- START dashboard main content-->
               <div class="col-xl-12">
				  <?php /** / ?>
                  <!-- START chart-->
                  <div class="row">
                     <div class="col-xl-12">
                        <!-- START card-->
                        <div class="card card-default card-demo" id="cardChart9">
                           <div class="card-header"><a class="float-right" href="#" data-tool="card-refresh" data-toggle="tooltip" title="Refresh card"><em class="fas fa-sync"></em></a><a class="float-right" href="#" data-tool="card-collapse" data-toggle="tooltip" title="Collapse card"><em class="fa fa-minus"></em></a>
                              <div class="card-title">Inbound visitor statistics</div>
                           </div>
                           <div class="card-wrapper">
                              <div class="card-body">
                                 <div class="chart-spline flot-chart"></div>
                              </div>
                           </div>
                        </div><!-- END card-->
                     </div>
                  </div><!-- END chart-->
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="card border-0">
                           <div class="row row-flush">
                              <div class="col-lg-2 col-md-3 col-6 bg-info py-4 d-flex align-items-center justify-content-center rounded-left"><em class="wi wi-day-sunny fa-4x"></em></div>
                              <div class="col-lg-2 col-md-3 col-6 py-2 br d-flex align-items-center justify-content-center">
                                 <div>
                                    <div class="h1 m-0 text-bold">32&deg;</div>
                                    <div class="text-uppercase">Clear</div>
                                 </div>
                              </div>
                              <div class="col-lg-2 col-md-3 d-none d-md-block py-2 text-center br">
                                 <div class="text-info text-sm">10 AM</div>
                                 <div class="text-muted text-md"><em class="wi wi-day-cloudy"></em></div>
                                 <div class="text-info"><span class="text-muted">20%</span></div>
                                 <div class="text-muted">27&deg;</div>
                              </div>
                              <div class="col-lg-2 col-md-3 d-none d-md-block py-2 text-center br">
                                 <div class="text-info text-sm">11 AM</div>
                                 <div class="text-muted text-md"><em class="wi wi-day-cloudy"></em></div>
                                 <div class="text-info"><span class="text-muted">30%</span></div>
                                 <div class="text-muted">28&deg;</div>
                              </div>
                              <div class="col-lg-2 py-2 text-center br d-none d-lg-block">
                                 <div class="text-info text-sm">12 PM</div>
                                 <div class="text-muted text-md"><em class="wi wi-day-cloudy"></em></div>
                                 <div class="text-info"><span class="text-muted">20%</span></div>
                                 <div class="text-muted">30&deg;</div>
                              </div>
                              <div class="col-lg-2 py-2 text-center d-none d-lg-block">
                                 <div class="text-info text-sm">1 PM</div>
                                 <div class="text-muted text-md"><em class="wi wi-day-sunny-overcast"></em></div>
                                 <div class="text-info"><span class="text-muted">0%</span></div>
                                 <div class="text-muted">30&deg;</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
				  <?php /**/ ?>
				  <?php /** / ?>
                  <div class="row">
                     <div class="col-xl-4">
                        <!-- START card-->
                        <div class="card border-0">
                           <div class="card-body">
                              <div class="d-flex">
                                 <h3 class="text-muted mt-0">300</h3><em class="ml-auto text-muted fa fa-coffee fa-2x"></em>
                              </div>
                              <div class="py-4" data-sparkline="" data-type="line" data-height="80" data-width="100%" data-line-width="2" data-line-color="#7266ba" data-spot-color="#888" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-values="1,3,4,7,5,9,4,4,7,5,9,6,4" data-resize="true"></div>
                              <p><small class="text-muted">Actual progress</small></p>
                              <div class="progress progress-xs mb-3">
                                 <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"><span class="sr-only">80% Complete</span></div>
                              </div>
                           </div>
                        </div><!-- END card-->
                     </div>
                     <div class="col-xl-8">
                        <div class="card card-default">
                           <div class="card-header">
                              <div class="px-2 float-right badge badge-danger">5</div>
                              <div class="px-2 mr-2 float-right badge badge-success">12</div>
                              <div class="card-title">Team messages</div>
                           </div><!-- START list group-->
                           <div class="list-group" data-height="180" data-scrollable="">
                              <!-- START list group item-->
                              <div class="list-group-item list-group-item-action">
                                 <div class="media"><img class="align-self-start mx-2 circle thumb32" src="img/user/02.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                       <p class="mb-1"><strong class="text-primary"><span class="circle bg-success circle-lg text-left"></span><span>Catherine Ellis</span></strong></p>
                                       <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                                    </div>
                                    <div class="ml-auto"><small class="text-muted ml-2">2h</small></div>
                                 </div>
                              </div><!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item list-group-item-action">
                                 <div class="media"><img class="align-self-start mx-2 circle thumb32" src="img/user/03.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                       <p class="mb-1"><strong class="text-primary"><span class="circle bg-success circle-lg text-left"></span><span>Jessica Silva</span></strong></p>
                                       <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                                    </div>
                                    <div class="ml-auto"><small class="text-muted ml-2">3h</small></div>
                                 </div>
                              </div><!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item list-group-item-action">
                                 <div class="media"><img class="align-self-start mx-2 circle thumb32" src="img/user/09.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                       <p class="mb-1"><strong class="text-primary"><span class="circle bg-danger circle-lg text-left"></span><span>Jessie Wells</span></strong></p>
                                       <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                                    </div>
                                    <div class="ml-auto"><small class="text-muted ml-2">4h</small></div>
                                 </div>
                              </div><!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item list-group-item-action">
                                 <div class="media"><img class="align-self-start mx-2 circle thumb32" src="img/user/12.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                       <p class="mb-1"><strong class="text-primary"><span class="circle bg-danger circle-lg text-left"></span><span>Rosa Burke</span></strong></p>
                                       <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                                    </div>
                                    <div class="ml-auto"><small class="text-muted ml-2"> 1d</small></div>
                                 </div>
                              </div><!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item list-group-item-action">
                                 <div class="media"><img class="align-self-start mx-2 circle thumb32" src="img/user/10.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                       <p class="mb-1"><strong class="text-primary"><span class="circle bg-danger circle-lg text-left"></span><span>Michelle Lane</span></strong></p>
                                       <p class="mb-1 text-sm">Mauris eleifend, libero nec cursus lacinia...</p>
                                    </div>
                                    <div class="ml-auto"><small class="text-muted ml-2"> 2d</small></div>
                                 </div>
                              </div><!-- END list group item-->
                           </div><!-- END list group-->
                           <!-- START card footer-->
                           <div class="card-footer">
                              <div class="input-group"><input class="form-control form-control-sm" type="text" placeholder="Search message .."><span class="input-group-btn"><button class="btn btn-secondary btn-sm" type="submit"><i class="fa fa-search"></i></button></span></div>
                           </div><!-- END card-footer-->
                        </div>
                     </div>
                  </div>
				  <?php /**/ ?>
               </div><!-- END dashboard main content-->
            </div>
         </div>
      </section>
	  