
      <aside class="aside-container">
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav class="sidebar" data-sidebar-anyclick-close="">
               <!-- START sidebar nav-->
               <ul class="sidebar-nav">
                  <!-- Iterates over all sidebar items-->
                  <li class="nav-heading "><span data-localize="sidebar.heading.HEADER">Main Navigation</span></li>
                  <li class=" <?php if(!isset($_REQUEST['page-name']) or (isset($_REQUEST['page-name']) and $_REQUEST['page-name']=="dashboard")){ echo "active"; } ?> "><a href="./dashboard" title="Dashboard"><em class="icon-speedometer"></em><span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                     </a>
                  </li>
                  <li class=" "><a href="#Home" title="Home" data-toggle="collapse">
						<?php /** / ?>
                        <div class="float-right badge badge-success">2</div>
						<?php /**/ ?>
						<em class="icon-home"></em><span data-localize="sidebar.nav.Home">Home</span>
                     </a>
                     <ul class="sidebar-nav sidebar-subnav collapse" id="Home">
                        <li class="sidebar-subnav-header">Home</li>
                        <li class="<?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=='slider' or $_REQUEST['page-name']=='slider-a')){ echo "active"; } ?>"><a href="./slider" title="Slider"><span>Slider</span></a></li>
                        <li class="<?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=='companies-logo' or $_REQUEST['page-name']=='companies-logo-a')){ echo "active"; } ?>"><a href="./companies-logo" title="Companies Logo"><span>Companies Logo</span></a></li>
                     </ul>
                  </li>
                  <li class=" "><a href="#CompanyProfile" title="CompanyProfile" data-toggle="collapse">
						<?php /** / ?>
                        <div class="float-right badge badge-success">2</div>
						<?php /**/ ?>
						<em class="icon-menu"></em><span data-localize="sidebar.nav.CompanyProfile">About Me</span>
                     </a>
                     <ul class="sidebar-nav sidebar-subnav collapse" id="CompanyProfile">
                        <li class="sidebar-subnav-header">About Me</li>
                        <li class="<?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=='about-me-slider' or $_REQUEST['page-name']=='about-me-slider-a')){ echo "active"; } ?>"><a href="./about-me-slider" title="Slider"><span>Slider</span></a></li>
                        <li class="<?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=='about-me-content')){ echo "active"; } ?>"><a href="./about-me-content" title="Content"><span>Content</span></a></li>
                     </ul>
                  </li>
                  <li class=" <?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=="gallery")){ echo "active"; } ?> "><a href="./gallery" title="Gallery"><em class="icon-screen-desktop"></em><span data-localize="sidebar.nav.gallery">Gallery</span>
                     </a>
                  </li>
                  <li class="<?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=='resume') and isset($_REQUEST['id']) and ($_REQUEST['id']==1)){ echo "active"; } ?>"><a href="./resume&id=1" title="Resume">
						<?php /** / ?>
                        <div class="float-right badge badge-success">2</div>
						<?php /**/ ?>
						<em class="icon-notebook"></em><span data-localize="sidebar.nav.Resume">Resume</span>
                     </a>
                  </li>
                  <li class=" <?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=="messages")){ echo "active"; } ?> "><a href="./messages" title="Messages"><em class="icon-bubble"></em><span data-localize="sidebar.nav.messages">Messages</span>
                     </a>
                  </li>
                  <li class=" <?php if(isset($_REQUEST['page-name']) and ($_REQUEST['page-name']=="contact-info" or $_REQUEST['page-name']=="contact-info-a")){ echo "active"; } ?> "><a href="./contact-info" title="ContactInfo"><em class="icon-envelope"></em><span data-localize="sidebar.nav.ContactInfo">Contact Info</span>
                     </a>
                  </li>
               </ul><!-- END sidebar nav-->
            </nav>
         </div><!-- END Sidebar (left)-->
      </aside>