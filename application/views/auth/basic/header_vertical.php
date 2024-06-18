<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="hover"
      data-menu="vertical-menu" data-col="2-columns">

    <div class="blobs">
        <div class="blob-center"></div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </defs>
    </svg>

    <div class="myAlert-top alert alert-success slideRightToLeft" id="success_msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> <?= $msg[1] ?>.
    </div>
    <div class="myAlert-top alert alert-danger slideRightToLeft" id="err_msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> <?= $msg[1] ?>.
    </div>
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="<?= base_url('Auth/Dashboard') ?>"><img class="brand-logo" alt="<?= $basic_details->site_name ?>" src="<?= base_url($basic_details->logo) ?>">
                               </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern...">
                            </div>
                        </li> -->
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1">Hello,<span class="user-name text-bold-700"><?= $admin->role_ab_user_username?></span></span><span class="avatar avatar-online"><img src="<?= base_url('asset/auth') ?>/images/crisil-logo.png" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a> -->
                                <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?= base_url('Auth/Login/logout') ?>"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-in"></i><span class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <!-- <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> English</a>
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> Hindi</a> -->
                        </li>
                        <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span></a> -->
                            <!-- <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                                            </div>
                                        </div></a>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul> -->
                       <!--  </li> -->
                      <!--   <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a> -->
                            <!-- <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?= base_url('asset/auth') ?>/images/crisil-logo.png" alt="avatar"><i></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Margaret Govan</h6>
                                                <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </div></a>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
                            </ul> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <?php
                foreach ($menus as $menu => $menu_items) {
                    if (count($menu_items) == 1) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $menu_items[0]['active'] ?>"  href="<?= base_url($menu_items[0]['link']) ?>"><i class="la la-home"></i>
                                <span><?= $menu_items[0]['name'] ?></span>

                            </a>
                        </li>
                    <?php } else {
                        ?>
                        <li class="nav-item"><a  href="#"><i class="la la-television"></i><span class="menu-title"><?= $menu ?></span></a>
                            <ul class="menu-content">
                                <?php foreach ($menu_items as $menu_item) {
                                    ?>
                                    <li class="<?= $menu_item['active'] ?>"><a class="menu-item " href="<?= base_url($menu_item['link']) ?>" data-toggle="dropdown"><?= $menu_item['name'] ?></a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>
                <li style="height:100px;"></li>
            </ul>
        </div>
    </div>


    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow cus-top-menu hidden-xs" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container  main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav " id="main-menu-navigation" data-menu="menu-navigation">
                <?php
                if ($side_menus != '') {
                    foreach ($side_menus as $side_menuName => $side_menuValues) {
                        ?>
                        <li class="nav-item"><a class="nav-link"><b><?= $side_menuName ?></b> :</a></li>
                        <?php foreach ($side_menuValues as $side_menuValue) { ?>
                            <li class="nav-item ">
                                <a class="nav-link <?= $side_menuValue['active'] ?>" href="<?= base_url($side_menuValue['link']) ?>"><i class="la la-hand-o-right"></i><span><?= $side_menuValue['name'] ?></span></a>
                            </li>
                        <?php } ?>
                        <?php
                    }
                } else {
                    ?>
                        <li class="nav-item"><a class="nav-link"><b>Dashboard</b> :</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('Auth/Dashboard') ?>"><i class="la la-hand-o-right"></i><span>Dashboard</span></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>


    <div class="app-content content cus-page" style="margin-top:40px;">
        <div class="content-wrapper">

