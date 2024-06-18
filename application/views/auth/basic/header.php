<body class="horizontal-layout horizontal-menu 2-columns menu-expanded" data-open="hover"
      data-menu="horizontal-menu" data-col="2-columns">

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
    <nav class="header-navbar  navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle" href="#"><i class="ft-menu font-large-1"></i></a></li> 
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            <?php if ($basic_details->school_aa_logo != '') { ?>
                                <img class="brand-logo" alt="modern admin logo" src="<?= base_url($basic_details->school_aa_logo) ?>" width="36px">
                                <?php } else { ?>
                                    <h3 class="brand-text"><?= $basic_details->school_aa_site_name ?></h3>
                                <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">Hello,
                                    <span class="user-name text-bold-700">There</span>
                                </span>
                                <span class="avatar avatar-online">
                                    <img src="<?= base_url('asset/auth') ?>/images/crisil-logo.png" style="width:36px;" alt="avatar"></span>
                            </a>
                        </li>

                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="<?= base_url('Auth/Login/logout') ?>"><i class="ficon ft-log-out"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
         role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container  main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav flexy-width1" id="main-menu-navigation" data-menu="menu-navigation">
                <?php
                foreach ($menus as $menu => $menu_items) {
                    if (count($menu_items) == 1) {
                        ?>
                        <li class="dropdown nav-item" data-menu="dropdown">
                            <a class="nav-link <?= $menu_items[0]['active'] ?>"  href="<?= base_url($menu_items[0]['link']) ?>"><i class="la la-home"></i>
                                <span><?= $menu_items[0]['name'] ?></span>

                            </a>
                        </li>
                    <?php } else {
                        ?>
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-television"></i><span><?= $menu ?></span></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menu_items as $menu_item) {
                                    ?>
                                    <li data-menu="" class="<?= $menu_item['active'] ?>"><a class="dropdown-item " href="<?= base_url($menu_item['link']) ?>" data-toggle="dropdown"><?= $menu_item['name'] ?></a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>

            </ul>
        </div>
    </div>

    <div class="app-content content cus-page">
        <div class="content-wrapper">