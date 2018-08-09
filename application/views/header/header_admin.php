<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

    <!-- Mirrored from getbootstrapadmin.com/remark/topbar/pages/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jul 2018 16:06:47 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title>Dashboard</title>

        <link rel="apple-touch-icon" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/favicon.ico">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/css/bootstrap.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/css/bootstrap-extend.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/css/site.min599c.css?v4.0.2">

        <!-- Skin tools (demo site only) -->
      <!-- <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/css/skintools.min599c.css?v4.0.2">
        <script src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/js/Plugin/skintools.min599c.js?v4.0.2"></script>
        -->
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/toastr/toastr.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/examples/css/advanced/toastr.min599c.css?v4.0.2">

        <!-- Plugins -->
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/animsition/animsition.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/switchery/switchery.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/intro-js/introjs.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min599c.css?v4.0.2">

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/examples/css/uikit/icon.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
        <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/fonts/font-awesome/font-awesome.min599c.css?v4.0.2">


        <!-- DataTable Css For This Page -->
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-bs4/dataTables.bootstrap4.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.min599c.css?v4.0.2">

         <!--[if lt IE 9]>
          <script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
          <![endif]-->

        <!--[if lt IE 10]>
          <script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/media-match/media.match.min.js?v4.0.2"></script>
          <script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/respond/respond.min.js?v4.0.2"></script>
          <![endif]-->

        <!-- Scripts -->
        <script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
        <script>
            Breakpoints();
        </script>

        <link id="skinStyle" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/skins/cyan.css" rel="stylesheet" type="text/css">
        
    </head>
    <body class="animsition site-navbar-small ">
        <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->

        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse"
             role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                        data-toggle="menubar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                        data-toggle="collapse">
                    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand navbar-brand-center" href="#">
                    <img class="navbar-brand-logo navbar-brand-logo-normal" style="height: 32px;" src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/logo2.png"
                         title="Remark">
                    <img class="navbar-brand-logo navbar-brand-logo-special" style="height: 32px;"  src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/images/logo2.png"
                         title="Remark">

                    <span class="navbar-brand-text hidden-xs-down" style="color:#6cd9d0"> 
                        SMART 
                    </span> 
                    <span class="navbar-brand-text hidden-xs-down" style="color:#fff;font-size: 10px;"> 
                        DEVELOPER </span>

                </a>
                <!-- <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                   data-toggle="collapse">
                   <span class="sr-only">Toggle Search</span>
                   <i class="icon wb-search" aria-hidden="true"></i>
                 </button> -->
            </div>

            <div class="navbar-container container-fluid">
                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                    <!-- Navbar Toolbar -->
                    <ul class="nav navbar-toolbar">
                        <li class="nav-item hidden-float" id="toggleMenubar">
                            <a class="nav-link" data-toggle="menubar" href="#" role="button">
                                <i class="icon hamburger hamburger-arrow-left">
                                    <span class="sr-only">Toggle menubar</span>
                                    <span class="hamburger-bar"></span>
                                </i>
                            </a>
                        </li>

                        <!--<li class="nav-item hidden-float">
                          <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                            role="button">
                            <span class="sr-only">Toggle Search</span>
                          </a>
                        </li>
                        
                        <li class="nav-item dropdown dropdown-fw dropdown-mega">
                          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="fade"
                            role="button">Mega <i class="icon wb-chevron-down-mini" aria-hidden="true"></i></a>
                          <div class="dropdown-menu" role="menu">
                            <div class="mega-content">
                              <div class="row">
                                <div class="col-md-4">
                                  <h5>UI Kit</h5>
                                  <ul class="blocks-2">
                                    <li class="mega-menu m-0">
                                      <ul class="list-icons">
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/animation.html">Animation</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/buttons.html">Buttons</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/colors.html">Colors</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/dropdowns.html">Dropdowns</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/icons.html">Icons</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/lightbox.html">Lightbox</a>
                                        </li>
                                      </ul>
                                    </li>
                                    <li class="mega-menu m-0">
                                      <ul class="list-icons">
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/modals.html">Modals</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/panel-structure.html">Panels</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/overlay.html">Overlay</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/tooltip-popover.html">Tooltips</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/scrollable.html">Scrollable</a>
                                        </li>
                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                          <a
                                            href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/typography.html">Typography</a>
                                        </li>
                                      </ul>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-md-4">
                                  <h5>Media
                                    <span class="badge badge-pill badge-success">4</span>
                                  </h5>
                                  <ul class="blocks-3">
                                    <li>
                                      <a class="thumbnail m-0" href="javascript:void(0)">
                                        <img class="w-full" src="<?php echo base_url() . "themes/default/remark"; ?>/global/photos/view-1-150x100.jpg" alt="..." />
                                      </a>
                                    </li>
                                    <li>
                                      <a class="thumbnail m-0" href="javascript:void(0)">
                                        <img class="w-full" src="<?php echo base_url() . "themes/default/remark"; ?>/global/photos/view-2-150x100.jpg" alt="..." />
                                      </a>
                                    </li>
                                    <li>
                                      <a class="thumbnail m-0" href="javascript:void(0)">
                                        <img class="w-full" src="<?php echo base_url() . "themes/default/remark"; ?>/global/photos/view-3-150x100.jpg" alt="..." />
                                      </a>
                                    </li>
                                    <li>
                                      <a class="thumbnail m-0" href="javascript:void(0)">
                                        <img class="w-full" src="<?php echo base_url() . "themes/default/remark"; ?>/global/photos/view-4-150x100.jpg" alt="..." />
                                      </a>
                                    </li>
                                    <li>
                                      <a class="thumbnail m-0" href="javascript:void(0)">
                                        <img class="w-full" src="<?php echo base_url() . "themes/default/remark"; ?>/global/photos/view-5-150x100.jpg" alt="..." />
                                      </a>
                                    </li>
                                    <li>
                                      <a class="thumbnail m-0" href="javascript:void(0)">
                                        <img class="w-full" src="<?php echo base_url() . "themes/default/remark"; ?>/global/photos/view-6-150x100.jpg" alt="..." />
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-md-4">
                                  <h5 class="mb-0">Accordion</h5>
                                  
                                  <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"
                                    role="tablist">
                                    <div class="panel">
                                      <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                                        <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion"
                                          aria-expanded="false" aria-controls="siteMegaCollapseOne">
                                            Collapsible Group Item #1
                                          </a>
                                      </div>
                                      <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne"
                                        role="tabpanel">
                                        <div class="panel-body">
                                          De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                                          congressus ostendit alienae, voluptati ornateque accusamus
                                          clamat reperietur convicia albucius.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="panel">
                                      <div class="panel-heading" id="siteMegaAccordionHeadingTwo" role="tab">
                                        <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseTwo"
                                          data-parent="#siteMegaAccordion" aria-expanded="false"
                                          aria-controls="siteMegaCollapseTwo">
                                            Collapsible Group Item #2
                                          </a>
                                      </div>
                                      <div class="panel-collapse collapse" id="siteMegaCollapseTwo" aria-labelledby="siteMegaAccordionHeadingTwo"
                                        role="tabpanel">
                                        <div class="panel-body">
                                          Praestabiliorem. Pellat excruciant legantur ullum leniter vacare foris voluptate
                                          loco ignavi, credo videretur multoque choro fatemur
                                          mortis animus adoptionem, bello statuat expediunt naturales.
                                        </div>
                                      </div>
                                    </div>
              
                                    <div class="panel">
                                      <div class="panel-heading" id="siteMegaAccordionHeadingThree" role="tab">
                                        <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseThree"
                                          data-parent="#siteMegaAccordion" aria-expanded="false"
                                          aria-controls="siteMegaCollapseThree">
                                            Collapsible Group Item #3
                                          </a>
                                      </div>
                                      <div class="panel-collapse collapse" id="siteMegaCollapseThree" aria-labelledby="siteMegaAccordionHeadingThree"
                                        role="tabpanel">
                                        <div class="panel-body">
                                          Horum, antiquitate perciperet d conspectum locus obruamus animumque perspici probabis
                                          suscipere. Desiderat magnum, contenta poena desiderant
                                          concederetur menandri damna disputandum corporum.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </li> -->
                    </ul>
                    <!-- End Navbar Toolbar -->

                    <!-- Navbar Toolbar Right -->
                    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                        <!-- <li class="nav-item dropdown">
                           <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
                             aria-expanded="false" role="button">
                             <span class="flag-icon flag-icon-us"></span>
                           </a>
                           <div class="dropdown-menu" role="menu">
                             <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                               <span class="flag-icon flag-icon-gb"></span> English</a>
                             <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                               <span class="flag-icon flag-icon-fr"></span> French</a>
                             <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                               <span class="flag-icon flag-icon-cn"></span> Chinese</a>
                             <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                               <span class="flag-icon flag-icon-de"></span> German</a>
                             <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                               <span class="flag-icon flag-icon-nl"></span> Dutch</a>
                           </div>
                         </li> -->
                        <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                               data-animation="scale-up" role="button">
                                <span class="avatar avatar-online">
                                    <img src="<?php echo base_url() . "themes/default/remark"; ?>/global/portraits/5.jpg" alt="...">
                                    <i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <!-- <i class="icon wb-user" aria-hidden="true"></i> -->
                                    <?php
                                    if ($this->session->userdata("usertype") === "ADM" ||
                                            $this->session->userdata("usertype") === "INV" ||
                                            $this->session->userdata("usertype") === "COMPMAN") {
                                        echo $this->session->userdata("email");
                                    } else {
                                        
                                    }
                                    ?>

                                </a>
                                <!--<a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>-->
                                <div class="dropdown-divider" role="presentation"></div>
                                <a  data-target="#logOutModal" data-toggle="modal"    class="dropdown-item" href="#" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>

                            </div>
                        </li>
                        <!--
                        <li class="nav-item dropdown">
                          <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                            aria-expanded="false" data-animation="scale-up" role="button">
                              <i class="icon wb-bell" aria-hidden="true"></i>
                              <span class="badge badge-pill badge-danger up">5</span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <div class="dropdown-menu-header">
                              <h5>NOTIFICATIONS</h5>
                              <span class="badge badge-round badge-danger">New 5</span>
                            </div>
              
                            <div class="list-group">
                              <div data-role="container">
                                <div data-role="content">
                                  <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">A new order has been placed</h6>
                                        <time class="media-meta" datetime="2018-06-12T20:50:48+08:00">5 hours ago</time>
                                      </div>
                                    </div>
                                  </a>
                                  <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Completed the task</h6>
                                        <time class="media-meta" datetime="2018-06-11T18:29:20+08:00">2 days ago</time>
                                      </div>
                                    </div>
                                  </a>
                                  <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Settings updated</h6>
                                        <time class="media-meta" datetime="2018-06-11T14:05:00+08:00">2 days ago</time>
                                      </div>
                                    </div>
                                  </a>
                                  <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Event started</h6>
                                        <time class="media-meta" datetime="2018-06-10T13:50:18+08:00">3 days ago</time>
                                      </div>
                                    </div>
                                  </a>
                                  <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Message received</h6>
                                        <time class="media-meta" datetime="2018-06-10T12:34:48+08:00">3 days ago</time>
                                      </div>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="dropdown-menu-footer">
                              <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                  <i class="icon wb-settings" aria-hidden="true"></i>
                                </a>
                              <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                  All notifications
                                </a>
                            </div>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
                            aria-expanded="false" data-animation="scale-up" role="button">
                              <i class="icon wb-envelope" aria-hidden="true"></i>
                              <span class="badge badge-pill badge-info up">3</span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <div class="dropdown-menu-header" role="presentation">
                              <h5>MESSAGES</h5>
                              <span class="badge badge-round badge-info">New 3</span>
                            </div>
              
                            <div class="list-group" role="presentation">
                              <div data-role="container">
                                <div data-role="content">
                                  <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <span class="avatar avatar-sm avatar-online">
                                          <img src="<?php echo base_url() . "themes/default/remark"; ?>/global/portraits/2.jpg" alt="..." />
                                          <i></i>
                                        </span>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Mary Adams</h6>
                                        <div class="media-meta">
                                          <time datetime="2018-06-17T20:22:05+08:00">30 minutes ago</time>
                                        </div>
                                        <div class="media-detail">Anyways, i would like just do it</div>
                                      </div>
                                    </div>
                                  </a>
                                  <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <span class="avatar avatar-sm avatar-off">
                                          <img src="<?php echo base_url() . "themes/default/remark"; ?>/global/portraits/3.jpg" alt="..." />
                                          <i></i>
                                        </span>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Caleb Richards</h6>
                                        <div class="media-meta">
                                          <time datetime="2018-06-17T12:30:30+08:00">12 hours ago</time>
                                        </div>
                                        <div class="media-detail">I checheck the document. But there seems</div>
                                      </div>
                                    </div>
                                  </a>
                                  <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <span class="avatar avatar-sm avatar-busy">
                                          <img src="<?php echo base_url() . "themes/default/remark"; ?>/global/portraits/4.jpg" alt="..." />
                                          <i></i>
                                        </span>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">June Lane</h6>
                                        <div class="media-meta">
                                          <time datetime="2018-06-16T18:38:40+08:00">2 days ago</time>
                                        </div>
                                        <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                      </div>
                                    </div>
                                  </a>
                                  <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                    <div class="media">
                                      <div class="pr-10">
                                        <span class="avatar avatar-sm avatar-away">
                                          <img src="<?php echo base_url() . "themes/default/remark"; ?>/global/portraits/5.jpg" alt="..." />
                                          <i></i>
                                        </span>
                                      </div>
                                      <div class="media-body">
                                        <h6 class="media-heading">Edward Fletcher</h6>
                                        <div class="media-meta">
                                          <time datetime="2018-06-15T20:34:48+08:00">3 days ago</time>
                                        </div>
                                        <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                                      </div>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="dropdown-menu-footer" role="presentation">
                              <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                  <i class="icon wb-settings" aria-hidden="true"></i>
                                </a>
                              <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                  See all messages
                                </a>
                            </div>
                          </div>
                        </li>
                        <li class="nav-item" id="toggleChat">
                          <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
                            data-url="<?php echo base_url() . "themes/default/remark/topbar"; ?>/site-sidebar.tpl">
                              <i class="icon wb-chat" aria-hidden="true"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- End Navbar Toolbar Right -->
                </div>
                <!-- End Navbar Collapse -->

                <!-- Site Navbar Seach -->
                <div class="collapse navbar-search-overlap" id="site-navbar-search">
                    <form role="search">
                        <div class="form-group">
                            <div class="input-search">
                                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                        data-toggle="collapse" aria-label="Close"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Site Navbar Seach -->
            </div>
        </nav>
        <div class="site-menubar site-menubar-light">
            <div class="site-menubar-body">
                <div>
                    <div>
                        <ul class="site-menu" data-plugin="menu">

                            <?php if ($this->session->userdata("usertype") === "ADM") { ?>                            
                                <li class="site-menu-category">Admin</li>

                                <li class="dropdown site-menu-item has-sub" id="idDashboardAdmin">
                                    <a data-toggle="dropdown" href="<?php echo base_url(); ?>admin_dashboard" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                        <span class="site-menu-title">Dashboard</span>                                   
                                    </a>

                                </li>

                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-folder" aria-hidden="true"></i>
                                        <span class="site-menu-title">My Data</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span><!--<span class="site-menu-arrow"></span>-->
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>user_accountdata">
                                                                <span class="site-menu-title">Account Data</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>user_changepassword">
                                                                <span class="site-menu-title">Change Password</span>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-folder" aria-hidden="true"></i>
                                        <span class="site-menu-title">Projects</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span><!--<span class="site-menu-arrow"></span>-->
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>listalldocument">
                                                                <span class="site-menu-title">Project Documents Type</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item">
                                                            <a href="#">
                                                                <span class="site-menu-title">Validate Projects</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>admin_list_project_ppayout">
                                                                <span class="site-menu-title">Pending Payouts</span>
                                                            </a>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>



                                <li class="dropdown site-menu-item has-sub" id="idListInvestorAdmin">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                                        <span class="site-menu-title">Investors</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>admin_list_investor">
                                                                <span class="site-menu-title">Validate Investor</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>admin_list_investor_ipayout">
                                                                <span class="site-menu-title">Pending Payouts</span>
                                                            </a>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="dropdown site-menu-item has-sub" id="idListCompanyAdmin">
                                    <a data-toggle="dropdown" href="<?php echo base_url(); ?>admin_list_company" data-dropdown-toggle="false">
                                        <i class="site-menu-icon fa-users" aria-hidden="true"></i>
                                        <span class="site-menu-title">Companys</span>                                   
                                    </a>

                                </li>

                                <li class="dropdown site-menu-item has-sub" id="idAdminBankData">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon fa-bank" aria-hidden="true"></i>
                                        <span class="site-menu-title">Bank Data</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item" id="idAdminPaypalAcct">
                                                            <a href="<?php echo base_url(); ?>admin_paypalaccount">
                                                                <span class="site-menu-title">Paypal Account</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item" id="idAdminTransactionHistory">
                                                            <a href="<?php echo base_url(); ?>admin_transactionhistory">
                                                                <span class="site-menu-title">Transaction History</span>
                                                            </a>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="#" data-dropdown-toggle="false" onclick="$('#logOutModal').modal('show');">
                                        <i class="site-menu-icon wb-power" aria-hidden="true"></i>
                                        <span class="site-menu-title">Logout</span>                                   
                                    </a>                               
                                </li>

                            <?php } ?>   









                            <?php if ($this->session->userdata("usertype") === "INV") { ?>                            
                                <li class="site-menu-category">Investor</li>

                                <li class="dropdown site-menu-item has-sub" id="idDashboardInvestor">
                                    <a data-toggle="dropdown" href="<?php echo base_url(); ?>investor_dashboard" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                        <span class="site-menu-title">Dashboard</span>                                   
                                    </a>
                                </li>
                                
                                 <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-folder" aria-hidden="true"></i>
                                        <span class="site-menu-title">My Data</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>investor_data">
                                                                <span class="site-menu-title">Account Data</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>investor_changepassword">
                                                                <span class="site-menu-title">Change Password</span>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                
                                 <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon fa-dollar" aria-hidden="true"></i>
                                        <span class="site-menu-title">Investments</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>investor_investment">
                                                                <span class="site-menu-title">My Investments</span>
                                                            </a>
                                                        </li>

                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="dropdown site-menu-item has-sub" >
                                    <a data-toggle="dropdown" href="#" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-search" aria-hidden="true"></i>
                                        <span class="site-menu-title">Opportunities</span>                                   
                                    </a>
                                </li>
                                
                                
                                <li class="dropdown site-menu-item has-sub" id="idInvestorBankData">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon fa-bank" aria-hidden="true"></i>
                                        <span class="site-menu-title">Bank Data</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item" id="idInvestorPaypalAccount">
                                                            <a href="<?php echo base_url(); ?>investor_paypalaccount">
                                                                <span class="site-menu-title">Paypal Account</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item" id="idInvestorDepositFunds">
                                                            <a href="<?php echo base_url(); ?>investor_depositfunds">
                                                                <span class="site-menu-title">Deposit Funds</span>
                                                            </a>
                                                        </li>
                                                         <li class="site-menu-item" id="idInvestorWithdrawFunds">
                                                            <a href="<?php echo base_url(); ?>investor_withdrawfunds">
                                                                <span class="site-menu-title">Withdraw Funds</span>
                                                            </a>
                                                        </li>
                                                         <li class="site-menu-item"id="idInvestorTransactionHistory">
                                                            <a href="<?php echo base_url(); ?>investor_transactionhistory">
                                                                <span class="site-menu-title">Transaction History</span>
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                
                                
                                
                                <li class="dropdown site-menu-item has-sub" id="idInvestorInformation">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-info-circle" aria-hidden="true"></i>
                                        <span class="site-menu-title">Information</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item" id="idInvestorBasicData">
                                                            <a href="<?php echo base_url(); ?>investor_basicdata">
                                                                <span class="site-menu-title">Basic Data</span>
                                                            </a>
                                                        </li>                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                

                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="#" data-dropdown-toggle="false" onclick="$('#logOutModal').modal('show');">
                                        <i class="site-menu-icon wb-power" aria-hidden="true"></i>
                                        <span class="site-menu-title">Logout</span>                                   
                                    </a>                               
                                </li>

                            <?php } ?>    











                            <?php if ($this->session->userdata("usertype") === "COMPMAN") { ?>                            
                                <li class="site-menu-category">Company</li>

                                <li class="dropdown site-menu-item has-sub" id="idDashboardCompany">
                                    <a data-toggle="dropdown" href="<?php echo base_url(); ?>company_dashboard" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                        <span class="site-menu-title">Dashboard</span>                                   
                                    </a>
                                </li>
                                
                                 <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-folder" aria-hidden="true"></i>
                                        <span class="site-menu-title">My Data</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item">
                                                            <a href="#">
                                                                <span class="site-menu-title">Account Data</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item">
                                                            <a href="#">
                                                                <span class="site-menu-title">Change Password</span>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                 <li class="dropdown site-menu-item has-sub" id="idCompanyProjects" >
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon fa-cubes" aria-hidden="true"></i>
                                        <span class="site-menu-title">Projects</span>
                                        <span class="site-menu-icon wb-chevron-down-mini " ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item"  id="idCompanyListProject">
                                                            <a href="<?php echo base_url(); ?>company_project">
                                                                <span class="site-menu-title">My Projects</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url(); ?>project_list_investment_ipayout">
                                                                <span class="site-menu-title">Pending Payouts</span>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                
                                <li class="dropdown site-menu-item has-sub" id="idCompanyBankData">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon fa-bank" aria-hidden="true"></i>
                                        <span class="site-menu-title">Bank Data</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item" id="idCompanyPaypalAcct">
                                                            <a href="<?php echo base_url(); ?>company_paypalaccount">
                                                                <span class="site-menu-title">Paypal Account</span>
                                                            </a>
                                                        </li>

                                                        <li class="site-menu-item" id="idCompanyTransactionHistory">
                                                            <a href="<?php echo base_url(); ?>company_transactionhistory">
                                                                <span class="site-menu-title">Transaction history</span>
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                  
                                <li class="dropdown site-menu-item has-sub" id="idCompanyInformation">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="site-menu-icon wb-info-circle" aria-hidden="true"></i>
                                        <span class="site-menu-title">Information</span>
                                        <span class="site-menu-icon wb-chevron-down-mini" ></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="site-menu-scroll-wrap is-list">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-normal-list">
                                                        <li class="site-menu-item" id="idCompanyBasicData">
                                                            <a href="<?php echo base_url(); ?>company_basicdata">
                                                                <span class="site-menu-title">Basic Data</span>
                                                            </a>
                                                        </li>                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="dropdown site-menu-item has-sub">
                                    <a data-toggle="dropdown" href="#" data-dropdown-toggle="false" onclick="$('#logOutModal').modal('show');">
                                        <i class="site-menu-icon wb-power" aria-hidden="true"></i>
                                        <span class="site-menu-title">Logout</span>                                   
                                    </a>                               
                                </li>
                            <?php } ?>                                  






                        </ul>
                    </div>
                </div>
            </div>
        </div>
