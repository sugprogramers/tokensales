<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

    <!-- Mirrored from getbootstrapadmin.com/remark/topbar/pages/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jul 2018 16:06:47 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title>Dashaboard</title>

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

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/examples/css/uikit/icon.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
        <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
        <link rel="stylesheet" href="<?php echo base_url() . "themes/default/remark"; ?>/global/fonts/font-awesome/font-awesome.min599c.css?v4.0.2">

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
                                    <?php if ($this->session->userdata("login_admin")) {
                                        echo $this->session->userdata("email");
                                    } ?>

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
                            <li class="site-menu-category">General</li>
                            <li class="dropdown site-menu-item has-sub">
                                <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                    <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                    <span class="site-menu-title">Layouts</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="site-menu-scroll-wrap is-list">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-normal-list">
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/grids.html">
                                                            <span class="site-menu-title">Grid Scaffolding</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/layout-grid.html">
                                                            <span class="site-menu-title">Layout Grid</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/headers.html">
                                                            <span class="site-menu-title">Different Headers</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/panel-transition.html">
                                                            <span class="site-menu-title">Panel Transition</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/boxed.html">
                                                            <span class="site-menu-title">Boxed Layout</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/two-columns.html">
                                                            <span class="site-menu-title">Two Columns</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/bordered-header.html">
                                                            <span class="site-menu-title">Bordered Header</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item has-sub">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Page Aside</span>
                                                            <span class="site-menu-arrow"></span>
                                                        </a>
                                                        <ul class="site-menu-sub">
                                                            <li class="site-menu-item">
                                                                <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/aside-left-static.html">
                                                                    <span class="site-menu-title">Left Static</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/aside-right-static.html">
                                                                    <span class="site-menu-title">Right Static</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/aside-left-fixed.html">
                                                                    <span class="site-menu-title">Left Fixed</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/layouts/aside-right-fixed.html">
                                                                    <span class="site-menu-title">Right Fixed</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown site-menu-item has-sub active">
                                <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                    <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                                    <span class="site-menu-title">Pages</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="site-menu-scroll-wrap is-list">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-normal-list">
                                                    <li class="site-menu-item has-sub">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Errors</span>
                                                            <span class="site-menu-arrow"></span>
                                                        </a>
                                                        <ul class="site-menu-sub">
                                                            <li class="site-menu-item">
                                                                <a href="error-400.html">
                                                                    <span class="site-menu-title">400 Bad Request</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="error-403.html">
                                                                    <span class="site-menu-title">403 Forbidden</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="error-404.html">
                                                                    <span class="site-menu-title">404 Not Found</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="error-500.html">
                                                                    <span class="site-menu-title">500 Internal Server Error</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="error-503.html">
                                                                    <span class="site-menu-title">503 Service Unavailable</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="faq.html">
                                                            <span class="site-menu-title">FAQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="gallery.html">
                                                            <span class="site-menu-title">Gallery</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="gallery-grid.html">
                                                            <span class="site-menu-title">Gallery Grid</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="search-result.html">
                                                            <span class="site-menu-title">Search Result</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item has-sub">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Maps</span>
                                                            <span class="site-menu-arrow"></span>
                                                        </a>
                                                        <ul class="site-menu-sub">
                                                            <li class="site-menu-item">
                                                                <a href="map-google.html">
                                                                    <span class="site-menu-title">Google Maps</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="map-vector.html">
                                                                    <span class="site-menu-title">Vector Maps</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="maintenance.html">
                                                            <span class="site-menu-title">Maintenance</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="forgot-password.html">
                                                            <span class="site-menu-title">Forgot Password</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="lockscreen.html">
                                                            <span class="site-menu-title">Lockscreen</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="login.html">
                                                            <span class="site-menu-title">Login</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="register.html">
                                                            <span class="site-menu-title">Register</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="login-v2.html">
                                                            <span class="site-menu-title">Login V2</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="register-v2.html">
                                                            <span class="site-menu-title">Register V2</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="login-v3.html">
                                                            <span class="site-menu-title">Login V3</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="register-v3.html">
                                                            <span class="site-menu-title">Register V3</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="user.html">
                                                            <span class="site-menu-title">User List</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="invoice.html">
                                                            <span class="site-menu-title">Invoice</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item active">
                                                        <a href="blank.html">
                                                            <span class="site-menu-title">Blank Page</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item has-sub">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Email</span>
                                                            <span class="site-menu-arrow"></span>
                                                        </a>
                                                        <ul class="site-menu-sub">
                                                            <li class="site-menu-item">
                                                                <a href="email-articles.html">
                                                                    <span class="site-menu-title">Articles</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="email-welcome.html">
                                                                    <span class="site-menu-title">Welcome</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="email-post.html">
                                                                    <span class="site-menu-title">Post</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="email-thumbnail.html">
                                                                    <span class="site-menu-title">Thumbnail</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="email-news.html">
                                                                    <span class="site-menu-title">News</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="code-editor.html">
                                                            <span class="site-menu-title">Code Editor</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="profile.html">
                                                            <span class="site-menu-title">Profile</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="profile-v2.html">
                                                            <span class="site-menu-title">Profile V2</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="profile-v3.html">
                                                            <span class="site-menu-title">Profile V3</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="site-map.html">
                                                            <span class="site-menu-title">Sitemap</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="project.html">
                                                            <span class="site-menu-title">Project</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="site-menu-category">Elements</li>
                            <li class="dropdown site-menu-item has-section has-sub">
                                <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                    <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                                    <span class="site-menu-title">UI</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="dropdown-menu site-menu-sub site-menu-section-wrap blocks-md-3">
                                    <li class="site-menu-section site-menu-item has-sub">
                                        <header>
                                            <span class="site-menu-title">Basic UI</span>
                                            <span class="site-menu-arrow"></span>
                                        </header>
                                        <div class="site-menu-scroll-wrap is-section">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-section-list">
                                                        <li class="site-menu-item has-sub">
                                                            <a href="javascript:void(0)">
                                                                <span class="site-menu-title">Panel</span>
                                                                <span class="site-menu-arrow"></span>
                                                            </a>
                                                            <ul class="site-menu-sub">
                                                                <li class="site-menu-item">
                                                                    <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/panel-structure.html">
                                                                        <span class="site-menu-title">Panel Structure</span>
                                                                    </a>
                                                                </li>
                                                                <li class="site-menu-item">
                                                                    <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/panel-actions.html">
                                                                        <span class="site-menu-title">Panel Actions</span>
                                                                    </a>
                                                                </li>
                                                                <li class="site-menu-item">
                                                                    <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/panel-portlets.html">
                                                                        <span class="site-menu-title">Panel Portlets</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/buttons.html">
                                                                <span class="site-menu-title">Buttons</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/cards.html">
                                                                <span class="site-menu-title">Cards</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/dropdowns.html">
                                                                <span class="site-menu-title">Dropdowns</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/icons.html">
                                                                <span class="site-menu-title">Icons</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/list.html">
                                                                <span class="site-menu-title">List</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/tooltip-popover.html">
                                                                <span class="site-menu-title">Tooltip &amp; Popover</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/modals.html">
                                                                <span class="site-menu-title">Modals</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/tabs-accordions.html">
                                                                <span class="site-menu-title">Tabs &amp; Accordions</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/images.html">
                                                                <span class="site-menu-title">Images</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/badges.html">
                                                                <span class="site-menu-title">Badges</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/progress-bars.html">
                                                                <span class="site-menu-title">Progress Bars</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/carousel.html">
                                                                <span class="site-menu-title">Carousel</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/typography.html">
                                                                <span class="site-menu-title">Typography</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/colors.html">
                                                                <span class="site-menu-title">Colors</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/uikit/utilities.html">
                                                                <span class="site-menu-title">Utilties</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="site-menu-section site-menu-item has-sub">
                                        <header>
                                            <span class="site-menu-title">Advanced UI</span>
                                            <span class="site-menu-arrow"></span>
                                        </header>
                                        <div class="site-menu-scroll-wrap is-section">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-section-list">
                                                        <li class="site-menu-item hidden-sm-down site-tour-trigger">
                                                            <a href="javascript:void(0)">
                                                                <span class="site-menu-title">Tour</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/animation.html">
                                                                <span class="site-menu-title">Animation</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/highlight.html">
                                                                <span class="site-menu-title">Highlight</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/lightbox.html">
                                                                <span class="site-menu-title">Lightbox</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/scrollable.html">
                                                                <span class="site-menu-title">Scrollable</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/rating.html">
                                                                <span class="site-menu-title">Rating</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/context-menu.html">
                                                                <span class="site-menu-title">Context Menu</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/alertify.html">
                                                                <span class="site-menu-title">Alertify</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/masonry.html">
                                                                <span class="site-menu-title">Masonry</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/treeview.html">
                                                                <span class="site-menu-title">Treeview</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/toastr.html">
                                                                <span class="site-menu-title">Toastr</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/maps-vector.html">
                                                                <span class="site-menu-title">Vector Maps</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/maps-google.html">
                                                                <span class="site-menu-title">Google Maps</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/sortable-nestable.html">
                                                                <span class="site-menu-title">Sortable &amp; Nestable</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/advanced/bootbox-sweetalert.html">
                                                                <span class="site-menu-title">Bootbox &amp; Sweetalert</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="site-menu-section site-menu-item has-sub">
                                        <header>
                                            <span class="site-menu-title">Structure</span>
                                            <span class="site-menu-arrow"></span>
                                        </header>
                                        <div class="site-menu-scroll-wrap is-section">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-section-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/alerts.html">
                                                                <span class="site-menu-title">Alerts</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/ribbon.html">
                                                                <span class="site-menu-title">Ribbon</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/pricing-tables.html">
                                                                <span class="site-menu-title">Pricing Tables</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/overlay.html">
                                                                <span class="site-menu-title">Overlay</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/cover.html">
                                                                <span class="site-menu-title">Cover</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/timeline-simple.html">
                                                                <span class="site-menu-title">Simple Timeline</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/timeline.html">
                                                                <span class="site-menu-title">Timeline</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/step.html">
                                                                <span class="site-menu-title">Step</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/comments.html">
                                                                <span class="site-menu-title">Comments</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/media.html">
                                                                <span class="site-menu-title">Media</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/chat.html">
                                                                <span class="site-menu-title">Chat</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/testimonials.html">
                                                                <span class="site-menu-title">Testimonials</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/nav.html">
                                                                <span class="site-menu-title">Nav</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/navbars.html">
                                                                <span class="site-menu-title">Navbars</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/blockquotes.html">
                                                                <span class="site-menu-title">Blockquotes</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/pagination.html">
                                                                <span class="site-menu-title">Pagination</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/structure/breadcrumbs.html">
                                                                <span class="site-menu-title">Breadcrumbs</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown site-menu-item has-section has-sub">
                                <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                    <i class="site-menu-icon wb-plugin" aria-hidden="true"></i>
                                    <span class="site-menu-title">Compents</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="dropdown-menu site-menu-sub site-menu-section-wrap blocks-md-3">
                                    <li class="site-menu-section site-menu-item has-sub">
                                        <header>
                                            <span class="site-menu-title">Forms</span>
                                            <span class="site-menu-arrow"></span>
                                        </header>
                                        <div class="site-menu-scroll-wrap is-section">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-section-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/general.html">
                                                                <span class="site-menu-title">General Elements</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/material.html">
                                                                <span class="site-menu-title">Material Elements</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/advanced.html">
                                                                <span class="site-menu-title">Advanced Elements</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/layouts.html">
                                                                <span class="site-menu-title">Form Layouts</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/wizard.html">
                                                                <span class="site-menu-title">Form Wizard</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/validation.html">
                                                                <span class="site-menu-title">Form Validation</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/masks.html">
                                                                <span class="site-menu-title">Form Masks</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item has-sub">
                                                            <a href="javascript:void(0)">
                                                                <span class="site-menu-title">Editors</span>
                                                                <span class="site-menu-arrow"></span>
                                                            </a>
                                                            <ul class="site-menu-sub">
                                                                <li class="site-menu-item">
                                                                    <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/editor-summernote.html">
                                                                        <span class="site-menu-title">Summernote</span>
                                                                    </a>
                                                                </li>
                                                                <li class="site-menu-item">
                                                                    <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/editor-markdown.html">
                                                                        <span class="site-menu-title">Markdown</span>
                                                                    </a>
                                                                </li>
                                                                <li class="site-menu-item">
                                                                    <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/editor-ace.html">
                                                                        <span class="site-menu-title">Ace Editor</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/image-cropping.html">
                                                                <span class="site-menu-title">Image Cropping</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/forms/file-uploads.html">
                                                                <span class="site-menu-title">File Uploads</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="site-menu-section site-menu-item has-sub">
                                        <header>
                                            <span class="site-menu-title">Tables</span>
                                            <span class="site-menu-arrow"></span>
                                        </header>
                                        <div class="site-menu-scroll-wrap is-section">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-section-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/basic.html">
                                                                <span class="site-menu-title">Basic Tables</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/bootstrap.html">
                                                                <span class="site-menu-title">Bootstrap Tables</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/floatthead.html">
                                                                <span class="site-menu-title">floatThead</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/responsive.html">
                                                                <span class="site-menu-title">Responsive Tables</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/editable.html">
                                                                <span class="site-menu-title">Editable Tables</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/jsgrid.html">
                                                                <span class="site-menu-title">jsGrid</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/footable.html">
                                                                <span class="site-menu-title">FooTable</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/datatable.html">
                                                                <span class="site-menu-title">DataTables</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/jqtabledit.html">
                                                                <span class="site-menu-title">Jquery Tabledit</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/tables/table-dragger.html">
                                                                <span class="site-menu-title">Table Dragger</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="site-menu-section site-menu-item has-sub">
                                        <header>
                                            <span class="site-menu-title">Chart</span>
                                            <span class="site-menu-arrow"></span>
                                        </header>
                                        <div class="site-menu-scroll-wrap is-section">
                                            <div>
                                                <div>
                                                    <ul class="site-menu-sub site-menu-section-list">
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/chartjs.html">
                                                                <span class="site-menu-title">Chart.js</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/gauges.html">
                                                                <span class="site-menu-title">Gauges</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/flot.html">
                                                                <span class="site-menu-title">Flot</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/peity.html">
                                                                <span class="site-menu-title">Peity</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/sparkline.html">
                                                                <span class="site-menu-title">Sparkline</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/morris.html">
                                                                <span class="site-menu-title">Morris</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/chartist.html">
                                                                <span class="site-menu-title">Chartist.js</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/rickshaw.html">
                                                                <span class="site-menu-title">Rickshaw</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/pie-progress.html">
                                                                <span class="site-menu-title">Pie Progress</span>
                                                            </a>
                                                        </li>
                                                        <li class="site-menu-item">
                                                            <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/charts/c3.html">
                                                                <span class="site-menu-title">C3</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown site-menu-item has-sub">
                                <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                    <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
                                    <span class="site-menu-title">Widgets</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="site-menu-scroll-wrap is-list">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-normal-list">
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/widgets/statistics.html">
                                                            <span class="site-menu-title">Statistics Widgets</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/widgets/data.html">
                                                            <span class="site-menu-title">Data Widgets</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/widgets/blog.html">
                                                            <span class="site-menu-title">Blog Widgets</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/widgets/chart.html">
                                                            <span class="site-menu-title">Chart Widgets</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/widgets/social.html">
                                                            <span class="site-menu-title">Social Widgets</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/widgets/weather.html">
                                                            <span class="site-menu-title">Weather Widgets</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="site-menu-category">Apps</li>
                            <li class="dropdown site-menu-item has-sub">
                                <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                    <i class="site-menu-icon wb-grid-4" aria-hidden="true"></i>
                                    <span class="site-menu-title">Apps</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="site-menu-scroll-wrap is-list">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-normal-list">
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/contacts/contacts.html">
                                                            <span class="site-menu-title">Contacts</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/calendar/calendar.html">
                                                            <span class="site-menu-title">Calendar</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/notebook/notebook.html">
                                                            <span class="site-menu-title">Notebook</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/taskboard/taskboard.html">
                                                            <span class="site-menu-title">Taskboard</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item has-sub">
                                                        <a href="javascript:void(0)">
                                                            <span class="site-menu-title">Documents</span>
                                                            <span class="site-menu-arrow"></span>
                                                        </a>
                                                        <ul class="site-menu-sub">
                                                            <li class="site-menu-item">
                                                                <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/documents/articles.html">
                                                                    <span class="site-menu-title">Articles</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/documents/categories.html">
                                                                    <span class="site-menu-title">Categories</span>
                                                                </a>
                                                            </li>
                                                            <li class="site-menu-item">
                                                                <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/documents/article.html">
                                                                    <span class="site-menu-title">Article</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/forum/forum.html">
                                                            <span class="site-menu-title">Forum</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/message/message.html">
                                                            <span class="site-menu-title">Message</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/projects/projects.html">
                                                            <span class="site-menu-title">Projects</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/mailbox/mailbox.html">
                                                            <span class="site-menu-title">Mailbox</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/media/overview.html">
                                                            <span class="site-menu-title">Media</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/work/work.html">
                                                            <span class="site-menu-title">Work</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/location/location.html">
                                                            <span class="site-menu-title">Location</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a href="<?php echo base_url() . "themes/default/remark/topbar"; ?>/apps/travel/travel.html">
                                                            <span class="site-menu-title">Travel</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
